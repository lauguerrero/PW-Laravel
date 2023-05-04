<!DOCTYPE html>
<html lang="es">

<head>
    <title>TheReUseShop_Admin</title>

    <link rel="stylesheet" href="{{ URL::asset('css/Home.css'); }}">
</head>

<body>
    <header>
        <h1>MENU DE ADMIN</h1>
        <h2>Este es el menu de administrador del sistema</h2>

        <a href="{{ route('listaUsu') }}" class="btn1">Lista de Usuarios</a>
        <a href="{{ route('listaArt') }}" class="btn1">Lista de Articulos</a>
    </header>
</body>

</html>