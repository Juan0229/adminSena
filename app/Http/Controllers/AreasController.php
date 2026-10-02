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
}
