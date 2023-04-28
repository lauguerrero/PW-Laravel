@extends('layouts.header')
@section('contenido')

<!DOCTYPE html>
<html lang="es">

<head>
    <title>TheReUseShop</title>
    <link rel="stylesheet" href="{{ URL::asset('css/Login.css'); }}">
</head>

<body>
    <header>
        <h1>TheReUseShop</h1>
        <h2>Segundas oportunidades para objetos únicos</h2>

        <section>
            <form method="POST" action="{{ route('aut_register') }}">
                @csrf
                <label for="email">Email</label>
                <input type="text" name="email" size=8 maxlength=20 checked = "checked">
                <br>
                <br>
                <label for="password">Contraseña</label>
                <input type="password" name="pwd" size="8" maxlength="20">
                <br>
                <br>
                <input type="submit" value="Acceder">
            </form>
        </section>
    </header>
</body>

</html>

@endsection