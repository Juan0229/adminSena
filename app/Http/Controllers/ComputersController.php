<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computer;

class ComputersController extends Controller
{
    public function index()
    {
        $computers = Computer::all();

        return response()->json($computers);
    }
}
