<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require 'database_conection.php' ?>
    <?php require 'depurar.php' ?>
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $minimo = depurar($_POST["minimo"]);
        $maximo = depurar($_POST["maximo"]);
        $genero_filtro = depurar($_POST["genero_filtro"]);

            $sql = $_conexion -> prepare("SELECT * FROM comics 
                WHERE genero LIKE CONCAT('%',?,'%') 
                AND paginas > $minimo AND paginas < $maximo");
            $sql -> bind_param("s", $genero_filtro);
            $sql -> execute();
            $resultado = $sql -> get_result();
            $_conexion -> close(); 
    }

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        $sql2 = $_conexion -> prepare("SELECT * FROM comics");
        $sql2 -> execute();
        $resultado = $sql2 -> get_result();
        $_conexion -> close();
    }
    
    ?>
    <div class="container">
        <h1>Comics</h1>
        <form action="" method="post">
            <div class="row mb-3">
                <div class="col-2">
                    <a class="btn btn-primary" href="create_comic.php">Crear</a>
                    <input class="btn btn-primary" type="submit" value="Filtrar">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-2">
                    <label class="form-label">Páginas minimas</label>
                    <input class="form-control" type="numeric" name="minimo">
                </div>
                <div class="col-2">
                    <label class="form-label">Páginas maximas</label>
                    <input class="form-control" type="numeric" name="maximo">
                </div>
                <div class="col-2">
                    <label class="form-label">Género</label>
                    <select class="form-select" name="genero_filtro">
                        <option selected value="accion">Acción</option>
                        <option value="aventura">Aventuras</option>
                        <option value="romance">Romance</option>
                        <option value="comedia">Comedia</option>
                    </select>
                </div>
                <br>

            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Páginas</th>
                    <th>Género</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($fila = $resultado -> fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila["id_comic"] ?></td>
                        <td><?php echo $fila["titulo_comic"] ?></td>
                        <td><?php echo $fila["paginas"] ?></td>
                        <td><?php echo $fila["genero"] ?></td>
                        <td>
                            <form action="view_comic.php" method="get">
                                <input type="hidden" name="id_comic" value="<?php echo $fila["id_comic"] ?>">
                                <input class="btn btn-secondary" type="submit" value="Ver">
                            </form>
                        </td>
                        <td>
                            <form action="borrar_comic.php" method="get">
                                <input type="hidden" name="id_comic" value="<?php echo $fila["id_comic"] ?>">
                                <input class="btn btn-danger" type="submit" value="Eliminar">
                            </form>
                        </td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>