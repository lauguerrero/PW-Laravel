@extends('layouts.header')
@section('contenido')

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Perfil</title>
    <link rel="stylesheet" href="{{ URL::asset('css/Perfil.css'); }}">
</head>

<body>
    <h2>Bienvenido a tu perfil {{ $user->Nombre }}</h2>
    <h3>Tu informacion</h3>
    <br>
    <div class = info>
        Username: {{ $user->username }};
        <br>
        Nombre: {{ $user->Nombre }} {{ $user->Apellidos }};
        <br>
        Teléfono: {{ $user->Telefono }};
        <br>
        Correo: {{ $user->email }};
    </div>
    <div class=pass>
    Cambiar contraseña:
    <form method="post" action="{{ route('change_password') }}">
        @csrf
        <label for=pwd>Contraseña actual:</label>
        <input type=password name=pwd size=8 maxlength=20>
        @error('pwd')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <br>
        <label for=contra>Nueva contraseña:</label>
        <input type=password name=contra size=8 maxlength=20>
        @error('contra')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <input type=submit value=Cambiar>
    </form>
    </div>

    <h3>Tus articulos publicados</h3>
    <div class=table-container>
    <table class=anuncios>
        @foreach ($articulos as $articulo)
            @if($loop->iteration % 4 == 1)
                <tr>
            @endif
            <td>
                <div style="text-align: center;">
                    <form method="post">
                        <!-- Aquí puedes poner cualquier botón o formulario que necesites -->
                    </form>
                    <form action="{{ route('producto') }}" method="get">
                        <input type="hidden" name="Id_Articulo" value="{{ $articulo->Id_Articulo }}">
                        <input type="image" alt="Submit" class="imagen-anuncio" height="300" width="250" src="{{ $articulo->Imagen }}">
                        <br>
                        <button type="submit" class="texto-anuncio">
                            <div class="texto-anuncio" align="center">{{ $articulo->Nombre }} - {{ $articulo->Precio }}€</div>
                        </button>
                    </form>
                    @if ($articulo->id_UReserva != NULL)
                        Reservado
                    @else
                        No reservado
                    @endif
                </div>
            </td>
            @if($loop->iteration % 4 == 0 || $loop->last)
                </tr>
            @endif
        @endforeach
    </table>
    </div>
</body>
@endsection
