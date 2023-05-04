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
            <form method="POST" action="{{ route('validarInsertarUsu') }}">
                @csrf
                <label for="username">Nombre de usuario</label>
                <input type="text" name="username" value="{{ old('username') }}" size=14 maxlength=20 placeholder="Nombre de usuario" checked = "checked">
                @if ($errors->has('username'))
                    <div class="alert alert-danger">{{ $errors->first('username') }}</div>
                @endif
                <br>
                <br>
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" value="{{ old('Nombre') }}" size=8 maxlength=20 placeholder="Nombre"checked = "checked">
                @if ($errors->has('Nombre'))
                    <div class="alert alert-danger">{{ $errors->first('Nombre') }}</div>
                @endif
                <br>
                <br>
                <label for="Apellidos">Apellido</label>
                <input type="text" name="Apellidos" value="{{ old('Apellidos') }}" size=8 maxlength=20 placeholder="Apellido" checked = "checked">
                @if ($errors->has('Apellidos'))
                    <div class="alert alert-danger">{{ $errors->first('Apellidos') }}</div>
                @endif
                <br>
                <br>
                <label for="Telefono">Numero de Telefono</label>
                <input type="number" name="Telefono" value="{{ old('Telefono') }}" size=5 maxlength=9 placeholder="Numero de telefono" checked = "checked">
                @if ($errors->has('Telefono'))
                    <div class="alert alert-danger">{{ $errors->first('Telefono') }}</div>
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
                Administrador?
                <input type="radio" name="esAdmin" value="1"/>Si
                <input type="radio" name="esAdmin" value="0"/>No
                @if ($errors->has('esAdmin'))
                    <div class="alert alert-danger">{{ $errors->first('esAdmin') }}</div>
                @endif
                <br>
                <br>
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" size="13" placeholder="Contraseña" maxlength="20">
                @if ($errors->has('contrasena'))
                    <div class="alert alert-danger">{{ $errors->first('contrasena') }}</div>
                @endif
                <br>
                <br>
                <label for="contrasena_confirmation">Repetir contraseña</label>
                <input type="password" name="contrasena_confirmation" size="13" placeholder="Repetir contraseña" maxlength="20">
                @if ($errors->has('contrasena_confirmation'))
                    <div class="alert alert-danger">{{ $errors->first('contrasena_confirmation') }}</div>
                @endif
                <br>
                <br>
                <input type="submit" value="Acceder">
            </form>
        </section>
    </header>
</body>
</html>