<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home'); //esto debería ser la página "home" del proyecto anterior
});

Route::get('/articulos', [ArticuloController::class, 'articulos'])->name('articulos');
Route::get('/listadeseos', [ArticuloController::class, 'lista_deseos'])->name('lista_deseos');

Route::post('/addlistadeseos', [ArticuloController::class, 'add_lista_deseos'])->name('addlistadeseos');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
