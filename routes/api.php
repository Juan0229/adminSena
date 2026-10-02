<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AreasController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ComputersController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\ApprendicesController;

Route::get('/hola', function () {
    return response()->json(['mensaje' => 'Hola, funciona!']);
});

Route::get('/categories', [CategoryController::class, 'index'])
    ->name('api.v1.categories.index');

Route::post('/categories', [CategoryController::class, 'store'])
    ->name('api.v1.categories.store');

Route::get('/categories/{category}', [CategoryController::class, 'show'])
    ->name('api.v1.categories.show');

Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->name('api.v1.categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->name('api.v1.categories.destroy');

Route::get('/areas', [AreasController::class, 'index'])
    ->name('api.v1.areas.index');

Route::get('/training_centers', [TrainingController::class, 'index'])
    ->name('api.v1.training_centers.index');

Route::get('/computers', [ComputersController::class, 'index'])
    ->name('api.v1.computers.index');

Route::get('/courses', [CoursesController::class, 'index'])
    ->name('api.v1.courses.index');

Route::get('/teachers', [TeachersController::class, 'index'])
    ->name('api.v1.teachers.index');

Route::get('/apprentices', [ApprendicesController::class, 'index'])
    ->name('api.v1.apprentices.index');