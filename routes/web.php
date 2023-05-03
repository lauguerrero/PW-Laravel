<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PublicarController;


Route::get('/', function () {
    return view('articulos.index'); //esto debería ser la página "home" del proyecto anterior
});

//Rutas protegidas por inicio de sesión
Route::middleware(['auth'])->group(function () {
    Route::get('/articulos', [ArticuloController::class, 'articulos'])->name('articulos');
    Route::get('/publicar', [PublicarController::class, 'publicar'])->name('publicar');
    Route::post('/aut_publicar', [PublicarController::class, 'aut_publicar'])->name('aut_publicar');
    Route::get('/listadeseos', [ArticuloController::class, 'lista_deseos'])->name('lista_deseos');
    Route::get('/listareservas', [ArticuloController::class, 'lista_reservas'])->name('lista_reservas');

    Route::get('/addlistadeseos', [ArticuloController::class, 'add_lista_deseos'])->name('addlistadeseos');
    Route::get('/addreserva', [ArticuloController::class, 'addreserva'])->name('addreserva');

    Route::get('/producto', [ArticuloController::class, 'mostrar_articulo'])->name('mostrar_articulo');
    
    Route::get('/perfil', [UsuarioController::class, 'showProfile'])->name('showProfile');
    Route::post('/perfil/changePassword', [UsuarioController::class, 'change_password'])->name('change_password');
});

Route::get('/login', [IndexController::class, 'login'])->name('login');
Route::get('/register', [IndexController::class, 'register'])->name('register');
Route::post('/aut_login', [IndexController::class, 'aut_login'])->name('aut_login');
Route::post('/aut_register', [IndexController::class, 'aut_register'])->name('aut_register');
Route::get('/logout', [IndexController::class, 'logout'])->name('logout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
