<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use Cloudinary\Cloudinary;

class AreasController extends Controller
{
    private function cloudinary(): Cloudinary
    {
        return app(Cloudinary::class);
    }

    private function uploadToAreas(Request $request): array
    {
        $result = $this->cloudinary()->uploadApi()->upload(
            $request->file('image')->getRealPath(),
            [
                'folder' => 'Areas',
                'resource_type' => 'image',
                'public_id' => pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_FILENAME).'_'.time(),
            ]
        );

        return [
            'url' => $result['secure_url'],
            'public_id' => $result['public_id'],
        ];
    }

    private function destroyImage(?string $publicId): void
    {
        if (empty($publicId)) {
            return;
        }
        try {
            $this->cloudinary()->uploadApi()->destroy($publicId, ['resource_type' => 'image']);
        } catch (\Throwable $e) {
        }
    }

    public function index()
    {
        return response()->json(Area::all());
    }

    public function show($id)
    {
        return response()->json(Area::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ]);

        $area = Area::findOrFail($id);
        $area->name = $request->name;

        if ($request->hasFile('image')) {
            $this->destroyImage($area->image_public_id);
            $img = $this->uploadToAreas($request);
            $area->image = $img['url'];
            $area->image_public_id = $img['public_id'];
        }

        $area->save();

        return response()->json($area);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
        ]);

        $area = Area::create([
            'name' => $request->name,
        ]);

        if ($request->hasFile('image')) {
            $img = $this->uploadToAreas($request);
            $area->image = $img['url'];
            $area->image_public_id = $img['public_id'];
            $area->save();
        }

        return response()->json($area, 201);
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,webp|max:2048',
            'area_id' => 'nullable|integer|exists:areas,id',
        ]);

        $img = $this->uploadToAreas($request);

        if ($request->filled('area_id')) {
            $area = Area::find($request->area_id);
            if ($area) {
                $this->destroyImage($area->image_public_id);
                $area->image = $img['url'];
                $area->image_public_id = $img['public_id'];
                $area->save();
            }
        }

        return response()->json([
            'success' => true,
            'url' => $img['url'],
            'public_id' => $img['public_id'],
        ]);
    }

    public function removeImage($id)
    {
        $area = Area::findOrFail($id);
        $this->destroyImage($area->image_public_id);
        $area->image = null;
        $area->image_public_id = null;
        $area->save();

        return response()->json(['success' => true, 'message' => 'Imagen eliminada']);
    }

    public function destroy($id)
    {
        $area = Area::findOrFail($id);
        $this->destroyImage($area->image_public_id);
        $area->delete();

        return response()->json(['success' => true, 'message' => 'Área eliminada']);
    }
}
