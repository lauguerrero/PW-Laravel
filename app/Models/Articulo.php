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

    public function crearArticulo($datos)
    {
        return self::create($datos);
    }

    public function eliminarArticulo($id)
    {
        $articulo = self::find($id);
        if ($articulo) {
            return $articulo->delete();
        }
        return false;
    }

    public function obtenerArticulos()
    {
        return self::all();
    }

    public function obtenerArticulo($id)
    {
        return self::find($id);
    }
}
