<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Deseo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function showProfile(){
        $logged_user = Session::get('id');

        $user = DB::table('Usuario')->where('Id_Usuario', '=', $logged_user)->first();

        if (!$user) {
            abort(404, 'El registro no se ha encontrado.');
        }

        $user_articles = DB::table('Articulo')->where('id_Usuario', '=', $logged_user)->get();

        return view('profile', compact('user', 'user_articles'));
    }
}
