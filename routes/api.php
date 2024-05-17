<?php

use App\Http\Controllers\api\CategorieController;
use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\PayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/products' , [ProductController::class, 'index'])->name('products');
Route::post('/products' , [ProductController::class, 'store'])->name('products');
Route::get('/products/create' , [ProductController::class, 'create'])->name('products');
Route::delete('/products/{product}' , [ProductController::class, 'destroy'])->name('products');
Route::put('/products/{product}' , [ProductController::class, 'update'])->name('products');
Route::get('/products/{product}/edit' , [ProductController::class, 'edit'])->name('products');


Route::get('/categories' , [CategorieController::class, 'index'])->name('categories');
Route::post('/categories' , [CategorieController::class, 'store'])->name('categories');



Route::get('/clientes' , [ClienteController::class, 'index'])->name('clientes'); 
Route::post('/clientes' , [ClienteController::class, 'store'])->name('clientes');
Route::get('/clientes/create' , [ClienteController::class, 'create'])->name('clientes');
Route::delete('/clientes/{cliente}' , [ClienteController::class, 'destroy'])->name('clientes');
Route::put('/clientes/{cliente}' , [ClienteController::class, 'update'])->name('clientes');
Route::get('/clientes/{cliente}/edit' , [ClienteController::class, 'edit'])->name('clientes');

Route::get('/pays' , [PayController::class, 'index'])->name('pays'); 
Route::post('/pays' , [PayController::class, 'store'])->name('pays');
Route::get('/pays/create' , [PayController::class, 'create'])->name('pays');
Route::delete('/pays/{pay}' , [PayController::class, 'destroy'])->name('pays');
Route::put('/pays/{pay}' , [PayController::class, 'update'])->name('pays');
Route::get('/pays/{pay}/edit' , [PayController::class, 'edit'])->name('pays');