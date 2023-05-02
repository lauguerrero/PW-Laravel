<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deseo extends Model
{
    use HasFactory;

    protected $table = 'Deseos';
    protected $primaryKey = ['id_Usuario', 'id_Articulo'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public static function agregarDeseo($id_Usuario, $id_Articulo)
    {
        $deseo = new Deseo();
        $deseo->id_Usuario = $id_Usuario;
        $deseo->id_Articulo = $id_Articulo;
        $deseo->save();
    }

    public static function eliminarDeseo($id_Usuario, $id_Articulo)
    {
        $deletedRows = Deseo::where('id_Usuario', $id_Usuario)->where('id_Articulo', $id_Articulo)->delete();
    }

    public static function listaDeseos($id_Usuario)
    {
        return Deseo::where('id_Usuario', $id_Usuario)->get();
    }
    
}
