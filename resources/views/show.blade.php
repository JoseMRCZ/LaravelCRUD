<!DOCTYPE html>
<html>

<head>
    <!-- Cabecera del documento web-->
    <link rel="stylesheet" type="text/css" href="">
    <meta charset="utf-8" />
    <meta name="author" content="Reyes Cruz Jose Manuel" />
    <title>show blade php</title>
</head>

<body>

@if($categoriaGame)
<h1>El nombre del video juego es: {{$nameGame}} y la categoria es: {{$categoriaGame}}</h1>
@else
<h1>El nombre del video juego es: {{$nameGame}}</h1>
@endif

<h3>{{$fecha}}</h3>
        
</body>

</html>