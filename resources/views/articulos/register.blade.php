<!DOCTYPE html>
<html lang="es">

<head>
<link rel="stylesheet" href="{{ URL::asset('css/register.css'); }}">
</head>

<body>
    <header>
        <h1>TheReUseShop</h1>
        <h2>Segundas oportunidades para objetos únicos</h2>

        <section>
            <form method="POST" action="{{ route('aut_register') }}">
                @csrf
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" value="{{ old('name') }}" size=14 maxlength=20 placeholder="Nombre de usuario" checked = "checked">
                @if ($errors->has('username'))
                    <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                @endif
                <br>
                <br>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" size=8 maxlength=20 placeholder="Nombre"checked = "checked">
                <br>
                <br>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" value="{{ old('apellido') }}" size=8 maxlength=20 placeholder="Apellido" checked = "checked">
                <br>
                <br>
                <label for="telefono">Numero de Telefono</label>
                <input type="number" name="telefono" value="{{ old('phone') }}" size=5 maxlength=9 placeholder="Numero de telefono" checked = "checked">
                @if ($errors->has('telefono'))
                    <div class="alert alert-danger">{{ $errors->first('telefono') }}</div>
                @endif
                <br>
                <br>
                <label for="email">Correo electronico</label>
                <input type="text" name="email" value="{{ old('email') }}" size=12 maxlength=30 placeholder="Correo electronico" checked = "checked">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                @endif
                <br>
                <br>
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" size="13" placeholder="Contraseña" maxlength="20">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                @endif
                <br>
                <br>
                <label for="cpassword">Repetir contraseña</label>
                <input type="password" name="password_confirmation" size="13" placeholder="Repetir contraseña" maxlength="20">
                <br>
                <br>
                <input type="submit" value="Acceder">
            </form>
        </section>
    </header>
</body>
</html>