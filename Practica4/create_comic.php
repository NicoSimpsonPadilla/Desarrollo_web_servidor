<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create comic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
    <?php require 'depurar.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_titulo_comic = depurar($_POST["titulo_comic"]);
        $temp_paginas = depurar($_POST["paginas"]);
        $temp_genero = depurar($_POST["genero"]);

        if(!strlen($temp_titulo_comic) > 0) {
            $err_nombreProducto = "Debe de haber un titulo.";
        } else {
            $titulo_comic = $temp_titulo_comic;
        }
        if(!strlen($temp_paginas) > 0) {
            $temp_paginas = "Debe de haber un numero de pagina.";
        } else {
            $paginas = $temp_paginas;
        }
        if(!strlen($temp_genero) > 0) {
            $temp_genero = "Debe de haber un genero.";
        } else {
            $genero = $temp_genero;
        }

        $sql = $_conexion -> prepare("INSERT INTO comics VALUES (?,?,?,?)");
        $sql -> bind_param("isis", $id, $titulo_comic, $paginas, $genero);
        $sql -> execute();

        $_conexion -> close();
    }
    ?>

    <div class="container">
        <h1>Nuevo videojuego</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Título comic</label>
                <input class="form-control" type="text" name="titulo_comic">
            </div>
            <div class="mb-3">
                <label class="form-label">Página</label>
                <input class="form-control" type="number" name="paginas">
            </div>
            <div class="mb-3">
                <label class="form-label">Género</label>
                    <select class="form-select" name="genero">
                        <option selected value="accion">Acción</option>
                        <option value="aventura">Aventuras</option>
                        <option value="romance">Romance</option>
                        <option value="comedia">Comedia</option>
                    </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-primary" href="index.php">Volver</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>