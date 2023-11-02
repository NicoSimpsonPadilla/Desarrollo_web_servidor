<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Películas</title>
    <?php require 'pelicula.php' ?>
    <link rel="stylesheet" href="../Tabla_ejercicios.css">
</head>
<body>
    <?php
    $pelicula1 = new Pelicula(1, "Spiderman", "2020-01-01", "7");
    $pelicula2 = new Pelicula(2, "Batman", "2019-04-30", "16");
    $pelicula3 = new Pelicula(3, "Deathpool 2", "2018-05-10", "18");

    $peliculas = [$pelicula1, $pelicula2, $pelicula3];
    ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
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
</body>
</html>