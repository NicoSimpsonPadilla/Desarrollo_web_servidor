<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado_peliculas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <?php require 'base_de_datos.php' ?>
</head>
<body>
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
                $sql = "SELECT * FROM peliculas";
                $resultado = $conexion -> query($sql);

                while($fila = $resultado -> fetch_assoc()){
                    echo "<tr>";
                    echo "<td>" . $fila['id_pelicula'] . "</td>";
                    echo "<td>" . $fila['titulo'] . "</td>";
                    echo "<td>" . $fila['fecha_estreno'] . "</td>";
                    echo "<td>" . $fila['edad_recomendada'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>