@extends('layouts.header')
@section('contenido')
<br>
<link rel = "stylesheet" href = "{{ URL::asset('css/producto.css'); }}"> 


<div class="cuadro">
    <h2>{{ $articulo->Nombre }}</h2>
</div>

<div class="tabla">
    <table>
        <tr class="uno">
            <td>
                <img height="300" width="250" src="{{ asset(convertir_ruta($articulo->Imagen))}}">
            </td>
        
            <td id="td2" rowspan="2">
                Categoria: {{ $articulo->Tematica }}<br><br>
                Precio: {{ $articulo->Precio}}€<br><br>
                Telefono Contacto: {{ $usuario->Telefono }}
            </td>
        </tr>
    
        <tr>
            <td>
                {{ $articulo->Descripcion }}
            </td>
        </tr>
    </table>
</div>
<br>

<form method="get" action = '{{ route("addreserva")}}'>
    <div style="text-align:center;">
        <input type="hidden" name="Id_Articulo" value="{{ $articulo->Id_Articulo }}">
        @if($articulo->id_Usuario == $usuario->Id_Usuario)
            <!-- Si el usuario loggeado es el que publicó el anuncio no le aparece botón para reservar -->
        @elseif($articulo->id_UReserva == $usuario->Id_Usuario)
            <button type="submit" class="add-reserva" name="reserva" value="delete">Ya lo tienes reservado</button>
        @elseif($articulo->id_UReserva != NULL)
            <button type="button" class="add-reserva" name="reserva" value="null">Reservado</button>
        @else
            <button type="submit" class="add-reserva" name="reserva" value="add">Reservar</button>
        @endif
    </div>
</form>


</body>
</html>
@endsection