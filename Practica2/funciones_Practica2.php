<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>funciones_Practica2</title>
</head>
<body>
    <!-- Ejercicio 1 -->
    <?php
    function cambiarDivisa(float|int $dinero, 
    string $divisaA, string $divisaC) {
        $divisaA = strtoupper($divisaA); 
        $divisaC = strtoupper($divisaC);
        $dineroCambiado = match(true) {
            $divisaA == "E" && $divisaC == "D" => $dinero*1.06,
            $divisaA == "D" && $divisaC == "E" => $dinero*0.94,
            $divisaA == "E" && $divisaC == "Y" => $dinero*157.56,
            $divisaA == "Y" && $divisaC == "E" => $dinero*0.0063,
            $divisaA == "Y" && $divisaC == "D" => $dinero*0.0067,
            $divisaA == "D" && $divisaC == "Y" => $dinero*148.73,
            default => "Solo esta disponible el cambio entre Euros, Dolares y Yenes"
        };
        return $dineroCambiado;
    }
    ?>

    <!-- Ejercicio 2 -->
    <?php
    function sumatorio(int $numero) : int|string {
        $suma = 0;
        if ($numero > 0) {
            for ($i = 1; $i <= $numero; $i++) {
                $suma += $i;
            }
            return $suma;
        } else {
            return "error";
        }
    }

    function factorial(int $numero) : int|string {
        $calculo = 1;
        if ($numero > 0) {
            for ($i = 1; $i <= $numero; $i++) {
                $calculo *= $i;
            }
            return $calculo;
        } else {
            return "error";
        }
    }
    ?>

    <!-- Ejercicio 2 -->
    <?php
    function comprobarEstado(int $ejemplares) : string {
        $estado = match(true) {
            $ejemplares == 0 => "Extinto",
            $ejemplares > 0 && $ejemplares <= 500 => "En peligro critico",
            $ejemplares > 500 && $ejemplares <= 2000 => "En peligro",
            $ejemplares > 2000 => "Amenazado",
            default => "Error"
        };
        return $estado;
    }
    ?>
</body>
</html>