<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('welcome');


Route::get('/admin', function () {
    return view('homeadmin');
});
Route::get('admin/lines', [App\Http\Controllers\LineController::class, 'index'])->name('lines');
Route::get('admin/lines/create', [App\Http\Controllers\LineController::class, 'create'])->name('createline');
Route::post('admin/lines/create', [App\Http\Controllers\LineController::class, 'store'])->name('storeline');
Route::get('admin/lines/{id}', [App\Http\Controllers\LineController::class, 'show'])->name('showline');
Route::post('admin/lines/edit', [App\Http\Controllers\LineController::class, 'edit'])->name('editline');
Route::get('admin/lines/delete/{id}', [App\Http\Controllers\LineController::class, 'destroy'])->name('destroyline');





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactenosController::class, 'index'])->name('contact');
