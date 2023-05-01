<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('articulos.index');
    }

    public function login(){
        return view('articulos.login');
    }

    public function register(){
        return view('articulos.register');
    }

    public function aut_login(Request $request){
        $this->validate($request, [
            'email' => 'required|string|email',
            'contrasena' => 'required|string',
        ]);

        $credentials = [
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('contrasena'))
        ];

        if (Auth::attempt($credentials)) {
            return redirect('/articulos');
        }

        return redirect('/login')->withErrors([
            'email' => 'Estas credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function aut_register(Request $request){
        $this->validate($request, [
            'username' => 'required|string|unique:Usuario|max:255',
            'Nombre' => 'required|string|max:255',
            'Apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|unique:Usuario|max:255',
            'Telefono' => 'required|integer|unique:Usuario|digits:9',
            'contrasena' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'Nombre' => $request->Nombre,
            'Apellidos' => $request->Apellidos,
            'email' => $request->email,
            'Telefono' => $request->Telefono,
            'contrasena' => bcrypt($request->contrasena),
            'esAdmin' => 0,
        ]);

        Auth::login($user);

        return redirect('/articulos');
    }
}
