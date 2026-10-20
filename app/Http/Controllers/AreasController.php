<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;

class AreasController extends Controller
{
    public function index()
    {
        $areas = Area::all();

        return response()->json($areas);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $area = Area::create($validated);

        return response()->json($area, 201);
    }
}
