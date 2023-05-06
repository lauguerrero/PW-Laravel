<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="{{ URL::asset('css/Home.css'); }}">
</head>

<body>
    <header>
        <img src="../img/favicon.png" alt="Imagen Logotipo">
        <h1>TheReUseShop</h1>
        <h2>Segundas oportunidades para objetos únicos</h2>
    </header>
    <nav>
        <div class="div">
            <a href="{{ route('login') }}" class="btn1">Iniciar sesion</a>
            <a href="{{ route('register') }}" class="btn1">Registrarse</a>
        </div>
    </nav>
</body>

</html>

