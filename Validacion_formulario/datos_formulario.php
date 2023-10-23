<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos</title>
</head>
<body>
    <?php
    function depurar($entrada) {
        $salida = htmlspecialchars($entrada);
        $salida = trim($salida);
        return $salida;
    }

    function isValidDate($date) {
        list($year, $month, $day) = explode('-', $date);
        if ($year < date("Y")) {
            return false;
        } else {
            if ($month > date("m")) {
                return false;
            } else {
                if ($day > date("d")) {
                    return false;
                } else {
                    return checkdate($month, $day, $year);
                }
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $temp_usuario = depurar($_POST["usuario"]);

        $temp_nombre = depurar($_POST["nombre"]);
        // Para que los espacios en blanco no cuenten, para cod interno
        $temp_nombre = preg_replace("/[ ]{2,}/", ' ', $temp_nombre);

        $temp_apellidos = depurar($_POST["apellidos"]);
        // Para que los espacios en blanco no cuenten, para cod interno
        $temp_apellidos = preg_replace("/[ ]{2,}/", ' ', $temp_apellidos);

        $temp_nacimiento = depurar($_POST["nacimiento"]);
    
        if(!strlen($temp_usuario) > 0) {
            $err_usuario = "El nombre de usuario es obligatorio";
        } else {
            // /^[a-zA-Z0-9]{4,8}$/
            $patron = "/^[a-zA-Z0-9]{4,8}$/";
            if(!preg_match($patron, $temp_usuario)) {
                $err_usuario = "El nombre debe tener entre 4 y 8 caracters
                y contener solamente letras o números";
            } else {
                $usuario = $temp_usuario;
            }
        }

        if(!strlen($temp_nombre) > 0) {
            $err_nombre = "El nombre de usuario es obligatorio";
        } else {
            // /^[a-zA-Z][a-zA-Z ]{0,30}[a-zA-Z]$/
            $patron = "/^[a-zA-Z][a-zA-Z ]{0,30}[a-zA-Z]$/";
            if(!preg_match($patron, $temp_nombre)) {
                $err_nombre = "El nombre debe tener entre 2 y 30 caracters
                y contener solamente letras y espacios";
            } else {
                $nombre = ucwords(strtolower($temp_nombre));
            }
        }

        if(!strlen($temp_apellidos) > 0) {
            $err_apellidos = "El apellido de usuario es obligatorio";
        } else {
            // /^[a-zA-Z][a-zA-Z ]{2,30}[a-zA-Z]$/
            $patron = "/^[a-zA-Z][a-zA-Z ]{0,30}[a-zA-Z]$/";
            if(!preg_match($patron, $temp_apellidos)) {
                $err_apellidos = "El apellido debe tener entre 2 y 30 caracters
                y contener solamente letras y espacios";
            } else {
                $apellidos = ucwords(strtolower($temp_apellidos));
            }
        }

        if(!strlen($temp_nacimiento) > 0) {
            $err_nacimiento = "El nacimiento es obligatoria";
        } else {
            if (!isValidDate($temp_nacimiento)) {
                $err_nacimiento = "Debes de ser mayor de edad";
            } else {
                $nacimiento = $temp_nacimiento;
            }
        }
    }

    ?>

    <form action="" method="post">
        <fieldset>
            <label>Usuario: </label>
            <input type="text" name="usuario">
            <?php if(isset($err_usuario)) echo $err_usuario ?>
            <br><br>
            <label>Nombre: </label>
            <input type="text" name="nombre">
            <?php if(isset($err_nombre)) echo $err_nombre ?>
            <br><br>
            <label>Apellidos:</label>
            <input type="text" name="apellidos">
            <?php if(isset($err_apellidos)) echo $err_apellidos ?>
            <br><br>
            <label>Fecha de nacimiento:</label>
            <input type="date" name="nacimiento">
            <?php if(isset($err_nacimiento)) echo $err_nacimiento ?>
            <br><br>
            <input type="submit" value="Registrarse">
        </fieldset>
    </form>
    
    <br><br>

    <?php
    if(isset($usuario) && isset($nombre) && isset($apellidos) && isset($nacimiento)) {
        echo strlen($apellidos);
        echo "<br>";
        echo "$nombre $apellidos nacio el $nacimiento 
        y su nombre de usuario es $usuario.";
    }
    ?>
</body>
</html>