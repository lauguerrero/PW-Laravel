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
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/articulos');
        }

        return redirect('/login')->withErrors([
            'email' => 'Estas credenciales no coinciden con nuestros registros.',
        ]);
    }

    public function aut_register(Request $request){
        $this->validate($request, [
            'username' => 'required|string|unique:users|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'telefono' => 'required|integer|unique:users|digits:9',
            'contrasena' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'contrasena' => bcrypt($request->contrasena),
        ]);

        Auth::login($user);

        return redirect('/articulos');
    }
}
