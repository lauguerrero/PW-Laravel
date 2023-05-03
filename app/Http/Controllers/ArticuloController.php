<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Deseo;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticuloController extends Controller
{
    public function articulos(){
        $articulos = Articulo::obtenerArticulosSinReservar();
        $logged_user = Auth::user()->Id_Usuario;
        $lista_deseos = Articulo::whereIn('Id_Articulo', function($query) use ($logged_user) {
            $query->select('id_Articulo')
                ->from('Deseos')
                ->where('id_Usuario', '=', $logged_user);
        })
        ->get();
        return view('articulos.articulos')->with(['articulos'=>$articulos, 'lista_deseos'=>$lista_deseos]);
    }

    public function lista_deseos(){
        $logged_user = Auth::user()->Id_Usuario;
        $articulos = Articulo::whereIn('Id_Articulo', function($query) use ($logged_user) {
            $query->select('id_Articulo')
                ->from('Deseos')
                ->where('id_Usuario', '=', $logged_user);
        })
        ->get();

        $lista_deseos = $articulos;

        return view('articulos.articulos')->with(['articulos'=>$articulos, 'lista_deseos'=>$lista_deseos]);
    }

    public function lista_reservas(){
        $logged_user = Auth::user()->Id_Usuario;
        $articulos = Articulo::where('id_UReserva', $logged_user)->get();
        $lista_deseos = Articulo::whereIn('Id_Articulo', function($query) use ($logged_user) {
            $query->select('id_Articulo')
                ->from('Deseos')
                ->where('id_Usuario', '=', $logged_user);
        })
        ->get();

        return view('articulos.articulos')->with(['articulos'=>$articulos, 'lista_deseos'=>$lista_deseos]);
    }

    public function add_lista_deseos(Request $request){
        $logged_user = Auth::user()->Id_Usuario;
        $id_articulo = $request->input('Id_Articulo');
        if($request->input('add-listadeseados') == 'add'){
            Deseo::agregarDeseo($logged_user, $id_articulo);
        }else if($request->input('add-listadeseados') == 'delete'){
            Deseo::eliminarDeseo($logged_user, $id_articulo);
        }else{
            // Error
        }
        return back();
    }

    public function mostrar_articulo(Request $request){
        $logged_user = Auth::user()->Id_Usuario;
        $usuario = User::where('Id_Usuario', $logged_user)->first();
        $articulo = Articulo::where('Id_Articulo', $request->input('Id_Articulo'))->first();
        return view('articulos.producto')->with(['articulo'=>$articulo, 'usuario'=>$usuario]);
    }

    public function addreserva(Request $request){
        $logged_user = Auth::user()->Id_Usuario;
        $id_articulo = $request->input('Id_Articulo');

        $articulo = Articulo::find($id_articulo);
        if($request->input('reserva') == 'delete') { //En este caso significa que queremos cancelar la reserva del producto
            $articulo->id_UReserva = NULL;
        } else if($request->input('reserva') == 'add') { //En este caso significa que queremos reservar el producto
            $articulo->id_UReserva = $logged_user;
        }
        $articulo->save();
        return back();
    }
}
