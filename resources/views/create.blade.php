<!DOCTYPE html>
<html>

<head>
    <!-- Cabecera del documento web-->
    <link rel="stylesheet" type="text/css" href="">
    <meta charset="utf-8" />
    <meta name="author" content="Reyes Cruz Jose Manuel" />
    <title>create blade php</title>
</head>

<body>

<h1>Vista creada y en blade y llamada desde el controlador de la vista create</h1>
<p><a href="{{route('games')}}">Listar todos los juegos</a></p> 
        <h2>Formulario de creacion de videojuegos</h2>
        <form action="{{route('createVideogame')}}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Nombre del juego">
            @error('name_game')
              {{$message}}
            @enderror
            <select name="category_id" id="">
                @foreach($categories as $categoria)
                  <option value="{{$categoria->id}}">{{$categoria->name}}</option>
                @endforeach
</select>

<input type="submit" value="Enviar">
</form>
        
</body>

</html>