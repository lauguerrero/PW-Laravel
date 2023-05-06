<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'Articulo';
    protected $primaryKey = 'Id_Articulo';
    public $timestamps = false;
    protected $fillable = [
        'id_Usuario',
        'Nombre',
        'Tematica',
        'Precio',
        'Descripcion',
        'Estado',
        'Imagen',
        'id_UReserva'
    ];

    public static function crearArticulo($datos)
    {
        return self::create($datos);
    }

    public static function eliminarArticulo($id)
    {
        $articulo = self::find($id);
        if ($articulo) {
            return $articulo->delete();
        }
        return false;
    }

    public static function obtenerArticulos()
    {
        return self::all();
    }

    public static function obtenerArticulosSinReservar()
    {
        return self::all()->whereNull('id_UReserva');
    }

    public static function obtenerArticulo($id)
    {
        return self::find($id);
    }

    public static function buscarArticulos($query, $filtro) {
        $consulta = self::all()->where('Nombre', 'like', '%' . $query . '%');
        if($filtro != 'Categoria') {
            $consulta->where('Tematica', 'like', '%' . $filtro . '%');
        }
        return $consulta->get();
    }    
}
