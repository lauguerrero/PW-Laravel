<!DOCTYPE HTML>
<html>
<head>
    <title>Lista Usuarios</title>
    <link rel="stylesheet" href="{{ URL::asset('css/ListaUsu.css'); }}">
</head>
<body>
    <h1>Usuarios Registrados</h1>
    
    <table style="width:100%">
        <tr>
            <th>Id_Usuario</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Username</th>
            <th>Contrasena</th>
            <th>Es Administrador</th>
        </tr>
        @foreach ($usuarios as $usuario)
        <tr>
            <td>{{ $usuario->Id_Usuario }}</td>
            <td>{{ $usuario->Nombre }}</td>
            <td>{{ $usuario->Apellidos }}</td>
            <td>{{ $usuario->Telefono }}</td>
            <td>{{ $usuario->email }}</td>
            <td>{{ $usuario->username }}</td>
            <td>{{ $usuario->contrasena }}</td>
            <td>{{ $usuario->esAdmin }}</td>
        </tr>
        @endforeach
    </table>

    <h2>ELIMINACIÓN DE USUARIO</h2>
    <form method="POST" action="{{ route('eliminarUsu') }}">
        @csrf
        <label for="Id_Usuario">Seleccione el id del usuario a eliminar:</label>
        <input type="number" name="Id_Usuario">
        <input type="submit" value="Eliminar">
    </form>

    <h2>INSERTAR USUARIO</h2>
    <a href="{{ route('mostrarInsertarUsu') }}">Añadir nuevo usuario</a>
</body>
</html>
