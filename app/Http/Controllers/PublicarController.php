<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicarController extends Controller
{
    public function publicar(){
        return view('articulos.publicar');
    }

    public function aut_publicar(Request $request){
        $this->validate($request, [
            'Id_Usuario' => 'required|string|unique:Usuario|max:255',
            'Nombre' => 'required|string|max:255',
            'Tematica' => 'required|string|max:255',
            'Precio' => 'required|float',
            'Descripcion' => 'required|string|max:500',
            'Estado' => 'required|string',
            'Imagenes' => 'required|string',
        ]);

        $articulo = Articulo::create([
            'Id_Usuario' => $request->Id_Usuario,
            'Nombre' => $request->Nombre,
            'Tematica' => $request->Tematica,
            'Precio' => $request->Precio,
            'Descripcion' => $request->Descripcion,
            'Estado' => $request->Estado,
            'Imagenes' => $request->Imagenes,
        ]);

        Auth::login($articulo);

        return redirect('/articulos');
    }
}
