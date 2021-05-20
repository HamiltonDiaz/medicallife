<?php

use Illuminate\Support\Facades\Route;

//Vistas administrador
Route::prefix('/admin-medical')->middleware(['auth'])->group( function(){
    Route::get('/', function () {
        return view('homeadmin');
    });

    //-Lineas
    Route::get('/lines', [App\Http\Controllers\LineController::class, 'index'])->name('lines');
    Route::get('/lines/create', [App\Http\Controllers\LineController::class, 'create'])->name('createline');
    Route::post('/lines/create', [App\Http\Controllers\LineController::class, 'store'])->name('storeline');
    Route::get('/lines/{id}', [App\Http\Controllers\LineController::class, 'show'])->name('showline');
    Route::post('/lines/edit', [App\Http\Controllers\LineController::class, 'edit'])->name('editline');
    Route::get('/lines/delete/{id}', [App\Http\Controllers\LineController::class, 'destroy'])->name('destroyline');

    //-Productos
    Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [App\Http\Controllers\ProductController::class, 'create'])->name('createproduct');
    Route::post('/products/create', [App\Http\Controllers\ProductController::class, 'store'])->name('storeproduct');
    Route::post('/products/edit', [App\Http\Controllers\ProductController::class, 'edit'])->name('editproduct');
    Route::get('/products/delete/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('destroyproduct');

    //-Usuarios
    //Listar
    Route::get('/users-admin', [App\Http\Controllers\UsuariosController::class, 'index'])->name('users-admin');
    //Mostrar formualrio
    Route::get('/users-admin/create', [App\Http\Controllers\UsuariosController::class, 'create'])->name('create-user');
    //Crear
    Route::post('/users-admin/create', [App\Http\Controllers\UsuariosController::class, 'store'])->name('store-user');
    //Editar
    Route::post('/users-admin/edit', [App\Http\Controllers\UsuariosController::class, 'edit'])->name('edit-user');
    //Eliminar
    Route::get('/users-admin/delete/{id}', [App\Http\Controllers\UsuariosController::class, 'destroy'])->name('destroy-user');


});




//Vistas Usuario
Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactenosController::class, 'index'])->name('contact');
Route::post('/sendcontact', [App\Http\Controllers\ContactenosController::class, 'send'])->name('sendcontact');
Route::get('/us/lines/{line}', [App\Http\Controllers\ProductController::class, 'showGroup'])->name('usproducts');
Route::get('/us/product/{id}', [App\Http\Controllers\ProductController::class, 'show'])->name('oneproduct');
Route::get('/us/product', [App\Http\Controllers\ProductController::class, 'filtrarProductos'])->name('filterproduct');
Route::get('/us/productname', [App\Http\Controllers\ProductController::class, 'filtrarProductosNombre'])->name('filterproductname');

//autoadmin user

Route::prefix('/users')->middleware(['auth'])->group( function(){
    Route::post('/uppass', [App\Http\Controllers\UsuariosController::class, 'cambiarContra'])->name('uppass');
    Route::post('/upinfo', [App\Http\Controllers\UsuariosController::class, 'cambiarDatos'])->name('upinfo');
});

