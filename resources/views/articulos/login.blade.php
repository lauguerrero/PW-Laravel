<!DOCTYPE html>
<html lang="es">

<head>
    <title>TheReUseShop</title>
    <link rel="stylesheet" href="{{ URL::asset('css/login.css'); }}">
</head>

<body>
    <header>
        <h1>TheReUseShop</h1>
        <h2>Segundas oportunidades para objetos únicos</h2>

        <section>
            <form method="POST" action="{{ route('aut_login') }}">
                @csrf
                <label for="email">Email</label>
                <input type="text" name="email" size=8 maxlength=20 checked = "checked">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                <br>
                <br>
                <label for="password">Contraseña</label>
                <input type="password" name="password" size="8" maxlength="20">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
                <br>
                <br>
                <input type="submit" value="Acceder">
            </form>
        </section>
    </header>
</body>

</html>

