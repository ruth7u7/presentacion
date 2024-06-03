<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Hola</title>
</head>
<body>
    <form action="{{ url('/') }}" method="post">
        @csrf
        <input type="text" name="tarea" id="tarea">
        <input type="submit" value="Agregar tarea">
    </form>

    <table>
        <tr>
            <td>Tareas </td>
            <td>Accion</td>
        </tr>

        @foreach($tareas as $tarea)
        <tr>
            <td>{{$tarea->tarea}}</td>
            <td>
                <form action="{{ route ('tarea.destroy', $tarea->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="X">
                </form>
                
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>