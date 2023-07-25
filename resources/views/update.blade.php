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
        <h2>Actualizar juego</h2>
        <form action="{{route('updateVideogame')}}" method="POST">
            @csrf
            <input type="hidden" name="game_id" value="{{$game->id}}">
            <input type="text" name="name_game" value="{{$game->name}}" placeholder="Nombre del juego">
            @error('name_game')
              {{$message}}
            @enderror
            <select name="categoria_id" id="">
                @foreach($categories as $categoria)
                  <option value="{{$categoria->id}}" @if($categoria->id == $game->category_id) selected @endif>{{$categoria->name}}</option>>
                @endforeach
</select>
<input type="submit" value="Enviar">
</form>
        
</body>

</html>