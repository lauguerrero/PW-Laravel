<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\User;
use App\Models\Deseo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function showProfile(){
        $user = Auth::user();
        $articulos = Articulo::where('Id_Usuario', $user->Id_Usuario)->get();

        return view('articulos.perfil')->with(['articulos'=>$articulos, 'user'=>$user]);
    }

    public function change_password(Request $request){
        $user = Auth::user();
        $currentPassword = $request->input('pwd');
        $newPassword = $request->input('contra');

        if (Hash::check($currentPassword, $user->contrasena)) {
            $user->contrasena = Hash::make($newPassword);
            $user->save();
            
            $request->session()->flash('success', 'Contraseña actualizada correctamente.');
            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['pwd' => 'La contraseña actual no es correcta.']);
        }
    }
}
