<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::get('/products' , [ProductController::class, 'index'])->name('products.index');
Route::post('/products' , [ProductController::class, 'store'])->name('products.store');
Route::get('/products/create' , [ProductController::class, 'create'])->name('products.create');
Route::delete('/products/{product}' , [ProductController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{product}' , [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{product}/edit' , [ProductController::class, 'edit'])->name('products.edit');


Route::get('/invoices' , [InvoiceController::class, 'index'])->name('invoices.index');
Route::post('/invoices' , [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoices/create' , [InvoiceController::class, 'create'])->name('invoices.create');
Route::delete('/invoices/{invoice}' , [InvoiceController::class, 'destroy'])->name('invoices.destroy');
Route::put('/invoices/{invoice}' , [InvoiceController::class, 'update'])->name('invoices.update');
Route::get('/invoices/{invoice}/edit' , [InvoiceController::class, 'edit'])->name('invoices.edit');


});

require __DIR__.'/auth.php';



