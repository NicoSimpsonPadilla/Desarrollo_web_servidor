<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado_peliculas2</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <?php require 'base_de_datos.php' ?>
    <?php require '../../objetos/pelicula.php' ?>
</head>
<body>
    <?php
    $sql = "SELECT * FROM peliculas";
    $resultado = $conexion -> query($sql);
    $peliculas = [];

    while($fila = $resultado -> fetch_assoc()) {
        $nueva_pelicula = new Pelicula(
            $fila["id_pelicula"],
            $fila["titulo"],
            $fila["fecha_estreno"],
            $fila["edad_recomendada"]
        );
        array_push($peliculas, $nueva_pelicula);
    }
    ?>
    <div class="container">
        <h1>Listado de películas</h1>
    </div>

    <div class="container">
        <table class="table table-primary table-striped-columns table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID pelicula</th>
                    <th>Título</th>
                    <th>Fecha de estreno</th>
                    <th>Edad recomendada</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($peliculas as $pelicula) {
                    echo "<tr>";
                    echo "<td>" . $pelicula ->  id_pelicula. "</td>
                    <td>" . $pelicula ->  titulo. "</td>
                    <td>" . $pelicula ->  fecha_estreno. "</td>
                    <td>" . $pelicula ->  edad_recomendada. "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>