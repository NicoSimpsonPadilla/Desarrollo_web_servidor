<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Plato</title>
</head>
<body>
    <form action="{{route('platos.store')}}" method="post">
        @csrf
        <label>Nombre: </label>
        <input type="text" name="nombre"><br><br>
        <label>Precio: </label>
        <input type="number" step="0.1" name="precio"><br><br>
        <label>Tipo: </label>
        <select name="tipo">
            <option value="Racion">Racion</option>
            <option value="Media Racion">Media Racion</option>
            <option value="Tapa">Tapa</option>
        </select>
        <br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>