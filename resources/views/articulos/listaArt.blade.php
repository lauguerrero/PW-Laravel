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
            <th>Id_Articulo</th>
            <th>id_Usuario</th>
            <th>Nombre</th>
            <th>Tematica</th>
            <th>Precio</th>
            <th>Descripcion</th>
            <th>Estado</th>
            <th>Imagen</th>
            <th>id_UReserva</th>
        </tr>
        @foreach ($articulos as $articulo)
        <tr>
            <td>{{ $articulo->Id_Articulo }}</td>
            <td>{{ $articulo->id_Usuario }}</td>
            <td>{{ $articulo->Nombre }}</td>
            <td>{{ $articulo->Tematica }}</td>
            <td>{{ $articulo->Precio }}</td>
            <td>{{ $articulo->Descripcion }}</td>
            <td>{{ $articulo->Estado }}</td>
            <td>{{ $articulo->Imagen }}</td>
            <td>{{ $articulo->id_UReserva }}</td>
        </tr>
        @endforeach
    </table>

    <h2>ELIMINACIÓN DE ARTICULO</h2>
    <form method="POST" action="{{ route('eliminarArt') }}">
        @csrf
        <label for="Id_Articulo">Seleccione el id del articulo a eliminar:</label>
        <input type="number" name="Id_Articulo">
        <input type="submit" value="Eliminar">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif

        @if (session('mensaje_error'))
            <div class="alert alert-danger">
                {{ session('mensaje_error') }}
            </div>
        @endif
    </form>

    <h2>INSERTAR ARTICULO</h2>
    <a href="{{ route('publicar') }}">Añadir nuevo articulo</a>
</body>
</html>
