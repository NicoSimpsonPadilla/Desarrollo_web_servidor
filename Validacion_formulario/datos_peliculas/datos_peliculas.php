<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos_peliculas</title>
    <?php require 'base_de_datos.php'; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
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

        // Por si no se selecciona nada en el select
        if(isset($_POST["edad_recomendada"])) {
            $temp_edad_recomendada = depurar($_POST["edad_recomendada"]);
        } else {
            $temp_edad_recomendada = "";
        }

        $nombre_imagen = $_FILES

        // Validacion de id_pelicula
        if(!strlen($temp_id_pelicula) > 0) {
            $err_id_pelicula = "La pelicula debe de tener un id";
        } else {
            if(filter_var($temp_id_pelicula, FILTER_VALIDATE_INT) == FALSE) {
                $err_id_pelicula = "Deben de ser números";
            } else {
                if (strlen($temp_id_pelicula) > 8) {
                $err_id_pelicula = "La pelicula debe de tener 8 digitos o menos";
                } else {
                    $temp_id_pelicula = (int) $temp_id_pelicula;
                    $id_pelicula = $temp_id_pelicula;
                }
            }
        }

        // Validacion de titulo
        if(!strlen($temp_titulo) > 0) {
            $err_titulo = "La pelicula debe de tener titulo";
        } else {
            if(strlen($temp_titulo) > 80) {
                $err_titulo = "No existe una pelicula con tantas letras";
            } else {
                $titulo = $temp_titulo;
            }
        }

        // Validacion de fecha_estreno
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

        // Validacion de edad_recomendada
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

    <div class="container">
        <h1>Insertar pelicula</h1>
        <div class="col-9">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">ID: </label>
                    <input class="form-control" type="number" name="id_pelicula">
                    <?php if(isset($err_id_pelicula)) echo $err_id_pelicula ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Titulo: </label>
                    <input class="form-control" type="text" name="titulo">
                    <?php if(isset($err_titulo)) echo $err_titulo ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Fecha de estreno:</label>
                    <input class="form-control" type="date" name="fecha_estreno">
                    <?php if(isset($err_fecha_estreno)) echo $err_fecha_estreno ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Edad recomendada:</label>
                    <select class="form-select" name="edad_recomendada">
                        <option disabled selected hidden>-- Elige una edad --</option>
                        <option value="0">Todos los publicos</option>
                        <option value="3">Mayores de 3 años</option>
                        <option value="7">Mayores de 7 años</option>
                        <option value="12">Mayores de 12 años</option>
                        <option value="16">Mayores de 16 años</option>
                        <option value="18">Mayores de 18 años</option>
                    </select>
                    <?php if(isset($err_edad_recomendada)) echo $err_edad_recomendada ?>
                </div>
                <div class="mb-3">
                    <label class="form-label">Imagen</label>
                    <input class="form-control" type="file" name="imagen">
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
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