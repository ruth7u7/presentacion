<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hola</title>
</head>
<body>
    <form action="{{ url('/') }}" method="post" style="padding-left:45%; padding-top:200px">
        @csrf
        <input type="text" name="tarea" id="tarea">
        <input type="submit" value="Agregar tarea">
    </form>

    <!-- <table style="border: 1; padding-left:45%"> -->
        <table class="tarea">
        <tr>
            <td>Tareas </td>
            <td>Acción</td>
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