<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\IndexController;
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
    return view('articulos.index'); //esto debería ser la página "home" del proyecto anterior
});

//Rutas protegidas por inicio de sesión
Route::middleware(['auth'])->group(function () {
    Route::get('/articulos', [ArticuloController::class, 'articulos'])->name('articulos');
    Route::get('/publicar', [PublicarController::class, 'publicar'])->name('publicar');
    Route::post('/aut_publicar', [PublicarController::class, 'aut_publicar'])->name('aut_publicar');
    Route::get('/listadeseos', [ArticuloController::class, 'lista_deseos'])->name('lista_deseos');

    Route::get('/addlistadeseos_articulo', [ArticuloController::class, 'add_lista_deseos_ART'])->name('addlistadeseos_articulo');
    Route::get('/addlistadeseos_deseo', [ArticuloController::class, 'add_lista_deseos_LIS'])->name('addlistadeseos_deseo');

    Route::get('/producto', [ArticuloController::class, 'mostrar_articulo'])->name('mostrar_articulo');
    
    Route::get('/perfil', [UsuarioController::class, 'showProfile'])->name('showProfile');
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
