<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\Auth;

class PublicarController extends Controller
{
    public function publicar(){
        return view('articulos.publicar');
    }

    public function aut_publicar(Request $request){
        $logged_user = Auth::user()->Id_Usuario;

        $this->validate($request, [
            'Nombre' => 'required|string|max:255',
            'Tematica' => 'required|string|max:255',
            'Precio' => 'required|integer',
            'Descripcion' => 'required|string|max:500',
            'Estado' => 'required|string',
            'Imagen' => 'required',
        ]);

        $articulo = new Articulo;
        $articulo->id_Usuario = $logged_user;
        $articulo->Nombre = $request->input('Nombre');
        $articulo->Tematica = $request->input('Tematica');
        $articulo->Precio = $request->input('Precio');
        $articulo->Descripcion = $request->input('Descripcion');
        $articulo->Estado = $request->input('Estado');
        $request->file('Imagen')->move(public_path('img'), $request->file('Imagen')->getClientOriginalName());
        $articulo->Imagen = './ImagenesArticulos/'.$request->file('Imagen')->getClientOriginalName();
        $articulo->id_UReserva = NULL;
        $articulo->save();

        return redirect('/articulos');
    }
}
