<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return response()->json($teachers);
    }
}
