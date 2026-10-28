<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaludosController;
use App\Http\Controllers\OperacionesController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/product/create',[ProductController::class,'create']);
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');




Route::get('/category/create',[CategoryController::class,'create']);
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');


Route::get('/hola', function () {
    return response()->json(['mensaje' => 'Hola, funciona!']);
});

Route::get('/frm_sumar',[OperacionesController::class,'frm_sumar']);
Route::post('/sumar',[OperacionesController::class,'sumar'])->name('sumar.store');
