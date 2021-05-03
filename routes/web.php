<?php

use Illuminate\Support\Facades\Route;

//Vistas administrador

//-Lineas
Route::get('/adminmedical', function () {
    return view('homeadmin');
});
Route::get('admin/lines', [App\Http\Controllers\LineController::class, 'index'])->name('lines');
Route::get('admin/lines/create', [App\Http\Controllers\LineController::class, 'create'])->name('createline');
Route::post('admin/lines/create', [App\Http\Controllers\LineController::class, 'store'])->name('storeline');
Route::get('admin/lines/{id}', [App\Http\Controllers\LineController::class, 'show'])->name('showline');
Route::post('admin/lines/edit', [App\Http\Controllers\LineController::class, 'edit'])->name('editline');
Route::get('admin/lines/delete/{id}', [App\Http\Controllers\LineController::class, 'destroy'])->name('destroyline');

//-Productos
Route::get('admin/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
Route::get('admin/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('createproduct');
Route::post('admin/products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('storeproduct');
Route::post('admin/products/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('editproduct');

Route::get('admin/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroyline');



//Vistas Usuario
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactenosController::class, 'index'])->name('contact');
Route::post('/sendcontact', [App\Http\Controllers\ContactenosController::class, 'send'])->name('sendcontact');
Route::get('/us/lines/{line}', [App\Http\Controllers\ProductController::class, 'showGroup'])->name('usproducts');
Route::get('/us/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('oneproduct');
Route::get('/us/product', [App\Http\Controllers\ProductController::class, 'filtrarProductos'])->name('filterproduct');