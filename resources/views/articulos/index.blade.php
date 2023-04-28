@extends('layouts.header')
@section('contenido')
        
<link rel="stylesheet" href="{{ URL::asset('css/Home.css'); }}">
<div class="home">
    <h1>TheReUseShop</h1>
    <h2>Segundas oportunidades para objetos únicos</h2>

    <a href="{{ route('login') }}" class="btn1">Iniciar sesion</a>
    <a href="{{ route('register') }}" class="btn1">Registrarse</a>
</div>
@endsection