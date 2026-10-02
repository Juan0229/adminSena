<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprentice;

class ApprendicesController extends Controller
{
    public function index()
    {
        $aprendices = Apprentice::all();

        return response()->json($aprendices);
    }
}
