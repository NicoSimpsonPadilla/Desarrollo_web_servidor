<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>listado peliculas 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <?php require 'base_de_datos.php' ?>
    <?php require '../../objetos/pelicula.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_pelicula = $_POST["id_pelicula"];
        echo "<p>La pelicula seleccionada es $id_pelicula</p>";
    }
    ?>

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
                        <th>Añadir cesta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($peliculas as $pelicula) { ?>
                        <tr>
                            <td><?php echo $pelicula -> id_pelicula ?></td>
                            <td><?php echo $pelicula -> titulo ?></td>
                            <td><?php echo $pelicula -> fecha_estreno ?></td>
                            <td><?php echo $pelicula -> edad_recomendada ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id_pelicula"
                                    value="<?php echo $pelicula -> id_pelicula ?>">
                                    <input class="btn btn-dark" type="submit" value="Añadir">
                                </form>
                            </td>
                        </tr>

                    <?php
                    }?>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>