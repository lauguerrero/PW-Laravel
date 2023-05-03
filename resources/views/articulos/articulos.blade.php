@extends('layouts.header')
@section('contenido')

<link rel="stylesheet" href="{{ URL::asset('css/articulos.css'); }}">

<div class="upperbar-container">
            <div class="searchbar" style="float:left;">
                <form method="post"> 
                    <input class="buscar" type="search" id="query" name="q" size="50" placeholder="Buscar artículos...">
                    <select name = "Filtro">
                        <option selected>Categoria</option>
                        <option>Deporte y ocio</option>
                        <option>Electronica</option>
                        <option>Moda y accesorios</option>
                        <option>Inmobiliaria</option>
                        <option>Libros</option>
                        <option>Coleccionismo</option>
                        <option>Otros</option>
                    </select>
                    <button class="buscar" type="submit" name="boton-buscar">Buscar</button>
                </form>
            </div>

            <div class="dropdown" style="float:right;">
                <button class="userbtn">Usuario</button>
                <div class="dropdown-content" style="float:left;">
                    <a href="{{ route('showProfile') }}">Mi Perfil</a>
                    <a href="{{ route('lista_deseos') }}">Lista Deseos</a>
                    <a href="{{ route('lista_reservas') }}">Lista Reservas</a>
                    <a href="{{ route('logout') }}" style="color: red">Cerrar Sesión</a>
                </div>
            </div>

            <div>
                <button class="publicar" style="float:right;"><a class="publicar" href="{{ route('publicar') }}">Publicar</a></button>
            </div>
        </div>

        <div class="table-container">
            <table class='anuncios'>
                @php
                    $columnas = 0;
                @endphp
                
                @foreach($articulos as $fila)

                    @if($columnas%4 == 0)
                        </tr><tr>
                    @endif

                    <td><div style="text-align: center;">
                        <form method="get" action='{{ route("addlistadeseos")}}'>
                            <div class="add-listadeseados-container">
                                <input type="hidden" name="Id_Articulo" value="{{$fila->Id_Articulo}}">
                                @if($lista_deseos->contains('Id_Articulo', $fila->Id_Articulo))
                                    <button type="submit" class="add-listadeseados" name="add-listadeseados" value="delete">En tu lista de deseos</button>
                                @else
                                    <button type="submit" class="add-listadeseados" name="add-listadeseados" value="add">Añadir a tu lista de deseos</button>
                                @endif
                            </div>
                        </form>

                        <form action='{{ route("mostrar_articulo")}}' method="get"><input type="hidden" name="Id_Articulo" value="{{$fila->Id_Articulo}}"><input type="image" alt="Submit" class="imagen-anuncio" height="300" width="250" src="{{ asset(convertir_ruta($fila->Imagen))}}">
                        <br>
                        <button type="submit" class="texto-anuncio"><div class="texto-anuncio" align="center">{{$fila->Nombre}} - {{$fila->Precio}}€</div></button></form>
                    </div></td>

                    @php
                        $columnas++;
                    @endphp
                @endforeach
            </table>
        </div>

@endsection