<?php

namespace App\Http\Controllers;
use App\Models\Articulo;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function articulos(){
        $articulos = Articulo::all();
        $logged_user = 1;
        $lista_deseos = Articulo::whereIn('Id_Articulo', function($query) use ($logged_user) {
            $query->select('id_Articulo')
                ->from('Deseos')
                ->where('id_Usuario', '=', $logged_user);
        })
        ->get();
        return view('articulos.articulos')->with(['articulos'=>$articulos, 'lista_deseos'=>$lista_deseos]);
    }

    public function lista_deseos(){
        $logged_user = 1; //Usuario logeado temporal de prueba
        $articulos = Articulo::whereIn('Id_Articulo', function($query) use ($logged_user) {
            $query->select('id_Articulo')
                ->from('Deseos')
                ->where('id_Usuario', '=', $logged_user);
        })
        ->get();

        return view('articulos.articulos')->with(['articulos'=>$articulos]);
    }

    public function add_lista_deseos(){
        $id_articulo = $request->input('Id_Articulo');

        $articulos = Articulo::all();
        return view('articulos.articulos')->with(['articulos'=>$articulos]);
    }

}
