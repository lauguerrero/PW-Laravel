@extends('layouts.header')
@section('contenido')
    <link rel="stylesheet" href="{{ URL::asset('css/publicar.css'); }}">

    <div class="container">

        <h2>Publicar</h2>

        <form action = "{{ route('aut_publicar') }}" method = "POST" enctype="multipart/form-data">

            @csrf
    
            <p>Nombre del Articulo: <input type = "text" name = "Nombre" size = "40"></p>
            @if ($errors->has('Nombre'))
                        <div class="alert alert-danger">{{ $errors->first('Nombre') }}</div>
            @endif
            
            Tematica:
            <select name="Tematica">
                <option>Deporte y ocio</option>
                <option>Electronica</option>
                <option>Moda y accesorios</option>
                <option>Inmobiliria</option>
                <option>Libros</option>
                <option>Coleccionismo</option> 
                <option>Otros</option> 
            </select>
            @if ($errors->has('Tematica'))
                        <div class="alert alert-danger">{{ $errors->first('Tematica') }}</div>
            @endif
    
            <p>Precio: <input type = "number" name = "Precio"></p>
            @if ($errors->has('Precio'))
                        <div class="alert alert-danger">{{ $errors->first('Precio') }}</div>
            @endif
            
            <!--<p>Descripcion: <input type = "text" name = "descripcion" size = "50" maxlength = "200"></p>-->
            <p>Descripcion:</p>
            <textarea name="Descripcion" id="" size ="100" maxlength="300"></textarea>
            <br>
            @if ($errors->has('Descripcion'))
                        <div class="alert alert-danger">{{ $errors->first('Descripcion') }}</div>
            @endif
    
            Estado:
            <select name="Estado">
                <option>Malo</option>
                <option>Aceptable</option>
                <option>Bueno</option>
                <option>Como Nuevo</option>
            </select>
            @if ($errors->has('Estado'))
                        <div class="alert alert-danger">{{ $errors->first('Estado') }}</div>
            @endif
    
            <!--<p>Imagen: <input type = "text" name = "imagen"></p>-->
            <p>Imagen: <input type = "file" name = "Imagen"></p>
            @if ($errors->has('Imagen'))
                        <div class="alert alert-danger">{{ $errors->first('Imagen') }}</div>
            @endif
    
            <input type = "submit" value = "Enviar">
    
        </form>
    </div>  

@endsection