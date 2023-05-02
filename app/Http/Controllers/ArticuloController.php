<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Deseo;

use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function articulos(){
        $articulos = Articulo::obtenerArticulos();
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

        $lista_deseos = $articulos;

        return view('articulos.listadeseos')->with(['articulos'=>$articulos, 'lista_deseos'=>$lista_deseos]);
    }

    public function add_lista_deseos_ART(Request $request){ //Añadir/Eliminar a la lsita de deseos desde la página "Articulos"
        $logged_user = 1;
        $id_articulo = $request->input('Id_Articulo');
        if($request->input('add-listadeseados') == 'add'){
            Deseo::agregarDeseo($logged_user, $id_articulo);
        }else if($request->input('add-listadeseados') == 'delete'){
            Deseo::eliminarDeseo($logged_user, $id_articulo);
        }else{
            // Error
        }

        $articulos = Articulo::obtenerArticulos();
        $lista_deseos = Articulo::whereIn('Id_Articulo', function($query) use ($logged_user) {
            $query->select('id_Articulo')
                ->from('Deseos')
                ->where('id_Usuario', '=', $logged_user);
        })
        ->get();
        return view('articulos.articulos')->with(['articulos'=>$articulos, 'lista_deseos'=>$lista_deseos]);
    }

    public function add_lista_deseos_LIS(Request $request){ //Añadir/Eliminar a la lista de deseos desde la página "Lista Deseos"
        $logged_user = 1; //Usuario logeado temporal de prueba
        $id_articulo = $request->input('Id_Articulo');
        if($request->input('add-listadeseados') == 'add'){
            Deseo::agregarDeseo($logged_user, $id_articulo);
        }else if($request->input('add-listadeseados') == 'delete'){
            Deseo::eliminarDeseo($logged_user, $id_articulo);
        }else{
            // Error
        }

        $articulos = Articulo::whereIn('Id_Articulo', function($query) use ($logged_user) {
            $query->select('id_Articulo')
                ->from('Deseos')
                ->where('id_Usuario', '=', $logged_user);
        })
        ->get();

        $lista_deseos = $articulos;

        return view('articulos.listadeseos')->with(['articulos'=>$articulos, 'lista_deseos'=>$lista_deseos]);
    }
}
