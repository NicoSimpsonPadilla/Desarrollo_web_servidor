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
    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id_comic"];

        $sql = $_conexion -> prepare("SELECT * FROM comics
            WHERE id_comic = ?");
        $sql -> bind_param("s", $id);
        $sql -> execute();
        $resultado = $sql -> get_result();

        $fila = $resultado -> fetch_assoc();
        $_conexion -> close();

        $titulo_comic = $fila["titulo_comic"];
        $paginas = $fila["paginas"];
        $genero = $fila["genero"];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_GET["id_comic"];
        $titulo_comic = depurar($_POST["titulo_comic"]);
        $paginas = depurar($_POST["paginas"]);
        $genero = depurar($_POST["genero"]);

        $sql = $_conexion -> prepare("UPDATE comics 
            SET titulo_comic = ?, paginas = ?, genero = ?
            WHERE id_comic = ?");
        $sql -> bind_param("sisi", $titulo_comic, $paginas, $genero, $id);
        $sql -> execute();
        header('location: index.php');
    }
    ?>

    <div class="container">
        <h1>Edit comic</h1>

        <form action="" method="post">
            <input type="hidden" name="titulo_original" value="<?php echo $titulo_comic ?>">
            <div class="mb-3">
                <label class="form-label">Título</label>
                <input class="form-control" type="text" name="titulo_comic" value="<?php echo $titulo_comic ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Páginas</label>
                <input class="form-control" type="number" name="paginas" value="<?php echo $paginas ?>">
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
                <input class="btn btn-primary" type="submit" value="Editar">
            </div>
            <a class="btn btn-primary" href="index.php">Volver</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>