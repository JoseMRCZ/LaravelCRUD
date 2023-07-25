<!DOCTYPE html>
<html>

<head>
    <!-- Cabecera del documento web-->
    <link rel="stylesheet" type="text/css" href="">
    <meta charset="utf-8" />
    <meta name="author" content="Reyes Cruz Jose Manuel" />
    <title>index blade php</title>
</head>

<body>

<h1>Vista creada y en blade y llamada desde el controlador</h1>
     <p><a href="{{route('gamesCreate')}}">Nuevo Videojuego</a></p>  
<h2>Listado de juegos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoria ID</th>
                    <th>Creado</th>
                    <th>Estado</th>
                    <th>Acciónes</th>
</tr>
</thead>
<tbody>
    @forelse($games as $game)
    <tr>
        <th>{{$game->id}}</th>
        <th><a href="{{route('viewGame',$game->id)}}">{{$game->name}}</a></th>
        <th>{{$game->category_id}}</th>
        <th>{{$game->created_at}}</th>
        <th>
            @if($game->active)
                <span style="color:green">Activo</span>
            @else
                <span style="color:red">Inactivo</span>
            @endif
        </th>
        <th>
            <a href="{{route('deleteGame',$game->id)}}">Eliminar</a>
        </th>
    </tr>
    @empty
    <tr>
        <th colspan="4">No hay datos</th>
    </tr>
    @endforelse

</tbody>
</table>
       
        
</body>

</html>