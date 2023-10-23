<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos_usuarios</title>
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
        $temp_usuario = depurar($_POST["usuario"]);

        $temp_nombre = depurar($_POST["nombre"]);
        // Para que los espacios en blanco no cuenten, para cod interno
        $temp_nombre = preg_replace("/[ ]{2,}/", ' ', $temp_nombre);

        $temp_apellidos = depurar($_POST["apellidos"]);
        // Para que los espacios en blanco no cuenten, para cod interno
        $temp_apellidos = preg_replace("/[ ]{2,}/", ' ', $temp_apellidos);

        $temp_fecha_nacimiento = depurar($_POST["fecha_nacimiento"]);
    
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

        if(strlen($temp_fecha_nacimiento) == 0) {
            $err_fecha_nacimiento = "La fecha de nacimiento es obligatoria";
        } else {
            $fecha_actual = date("Y-m-d");
            list($anyo_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);
            list($anyo, $mes, $dia) = explode('-', $temp_fecha_nacimiento);
            if($anyo_actual - $anyo > 18) {
                $fecha_nacimiento = $temp_fecha_nacimiento;
            } else if($anyo_actual - $anyo < 18) {
                $err_fecha_nacimiento = "No puedes ser menor de edad";
            } else {
                if($mes_actual - $mes > 0) {
                    $fecha_nacimiento = $temp_fecha_nacimiento;
                } else if($mes_actual - $mes < 0) {
                    $err_fecha_nacimiento = "No puedes ser menor de edad";
                } else {
                    if($dia_actual - $dia >= 0) {
                        $fecha_nacimiento = $temp_fecha_nacimiento;
                    }else{
                        $err_fecha_nacimiento = "No puedes ser menor de edad";
                    }
                }
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
            <input type="date" name="fecha_nacimiento">
            <?php if(isset($err_fecha_nacimiento)) echo $err_fecha_nacimiento ?>
            <br><br>
            <input type="submit" value="Registrarse">
        </fieldset>
    </form>
    
    <br><br>

    <?php
    if(isset($usuario) && isset($nombre) && isset($apellidos) && isset($fecha_nacimiento)) {
        echo strlen($apellidos);
        echo "<br>";
        echo "$nombre $apellidos nacio el $fecha_nacimiento 
        y su nombre de usuario es $usuario.";

        $sql = "INSERT INTO usuarios (usuario, nombre, apellidos, fecha_nacimiento)
            VALUES ('$usuario', '$nombre', '$apellidos', '$fecha_nacimiento')";

        $conexion -> query($sql);
    }
    ?>
</body>
</html>