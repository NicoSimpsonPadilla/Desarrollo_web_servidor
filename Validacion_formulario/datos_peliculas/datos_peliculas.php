<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos_peliculas</title>
    <?php require 'base_de_datos.php'; ?>
</head>
<body>
<?php
    function depurar($entrada) {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_id_pelicula = depurar($_POST["id_pelicula"]);

        $temp_titulo = depurar($_POST["titulo"]);
        // Para que los espacios en blanco no cuenten, para cod interno
        $temp_titulo = preg_replace("/[ ]{2,}/", ' ', $temp_titulo);

        $temp_fecha_estreno = depurar($_POST["fecha_estreno"]);

        $temp_edad_recomendada = depurar($_POST["edad_recomendada"]);
    
        if(!strlen($temp_id_pelicula) > 0) {
            $err_id_pelicula = "La pelicula debe de tener un id";
        } else {
            if (strlen($temp_id_pelicula) > 8) {
                $err_id_pelicula = "La pelicula debe de tener 8 digitos o menos";
            } else {
                $id_pelicula = $temp_id_pelicula;
            }
        }

        if(!strlen($temp_titulo) > 0) {
            $err_titulo = "La pelicula debe de tener titulo";
        } else {
            $titulo = $temp_titulo;
        }

        if(!strlen($temp_fecha_estreno) > 0) {
            $err_fecha_estreno = "La fecha de estreno es obligatoria";
        } else {
            list($anyo, $mes, $dia) = explode('-', $temp_fecha_estreno);
            if ($anyo < 1895) {
                $err_fecha_estreno = "Debe de ser despues de 1895";
            } else {
                $fecha_estreno = $temp_fecha_estreno;
            }
        }

        if(strlen($temp_edad_recomendada) == 0) {
            $err_edad_recomendada = "La edad recomendada es obligatoria";
        } else {
            if ($temp_edad_recomendada != 0 && $temp_edad_recomendada != 3 && 
            $temp_edad_recomendada != 7 && $temp_edad_recomendada != 12 && 
            $temp_edad_recomendada != 16 && $temp_edad_recomendada != 18) {
                $err_edad_recomendada = "La edad recomendada debe ser: 0, 3,
                 7, 12, 16, 18";
            } else {
                $edad_recomendada = $temp_edad_recomendada;
            }
        }
    }

    ?>

    <form action="" method="post">
        <fieldset>
            <label>ID: </label>
            <input type="number" name="id_pelicula">
            <?php if(isset($err_id_pelicula)) echo $err_id_pelicula ?>
            <br><br>
            <label>Titulo: </label>
            <input type="text" name="titulo">
            <?php if(isset($err_titulo)) echo $err_titulo ?>
            <br><br>
            <label>Fecha de estreno:</label>
            <input type="date" name="fecha_estreno">
            <?php if(isset($err_fecha_estreno)) echo $err_fecha_estreno ?>
            <br><br>
            <label>Edad recomendada:</label>
            <input type="number" name="edad_recomendada">
            <?php if(isset($err_edad_recomendada)) echo $err_edad_recomendada ?>
            <br><br>
            <input type="submit" value="Registrarse">
        </fieldset>
    </form>
    
    <br><br>

    <?php
    if(isset($id_pelicula) && isset($titulo) && isset($fecha_estreno) && isset($edad_recomendada)) {
        echo "Excelente!!";

        $sql = "INSERT INTO peliculas (id_pelicula, titulo, fecha_estreno, edad_recomendada)
            VALUES ('$id_pelicula', '$titulo', '$fecha_estreno', '$edad_recomendada')";

        $conexion -> query($sql);
    }
    ?>
</body>
</html>