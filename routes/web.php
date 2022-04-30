<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoCompleteController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('libros', App\Http\Controllers\LibroController::class)->middleware('auth');
Route::resource('categorias', App\Http\Controllers\CategoriaController::class)->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('search', [App\Http\Controllers\AutoCompleteController::class, 'index'])->name('search');
Route::get('autocomplete', [App\Http\Controllers\AutoCompleteController::class, 'autocomplete'])->name('autocomplete');

Route::get('/movement/{idProduct}',[App\Http\Controllers\MovementController::class, 'create'])->name('nuevoMovimiento');
Route::post('/movement/{idProduct}',[App\Http\Controllers\MovementController::class, 'store'])->name('storeMovimiento');