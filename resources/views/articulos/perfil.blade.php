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
        Nombre: {{ $user->Nombre }} {{ $user->Apellidos }};
        Teléfono: {{ $user->Telefono }};
        Correo: {{ $user->email }};
    </div>
    <div class=pass>
    Cambiar contrasena:
    <form method="post" action="{{ route('change_password') }}">
        @csrf
        <label for=pwd>Contrasena actual</label>;
        <input type=password name=pwd size=8 maxlength=20>;
        <br>
        <label for=contra>Nueva contrasena</label>
        <input type=password name=contra size=8 maxlength=20>
        <br>
        <input type=submit value=Cambiar>
    </form>
    </div>

    <h3>Tus articulos publicados</h3>
    <div class=table-container>
    <table class=anuncios>
    
    </table>
    </div>
</body>
@endsection