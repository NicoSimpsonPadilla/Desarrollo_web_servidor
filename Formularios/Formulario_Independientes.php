<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dos formularios independientes en el mismo php</title>
</head>
<body>
<?php
    function precioSuperreducido ($precio, $conSin) {
        if ($conSin == "C") $precio = $precio+((4/100)*$precio);
        elseif ($conSin == "S") $precio = $precio-((4/100)*$precio);
        return $precio;
    }
    function precioReducido ($precio, $conSin) {
        if ($conSin == "C") $precio = $precio+((10/100)*$precio);
        elseif ($conSin == "S") $precio = $precio-((10/100)*$precio);
        return $precio;
    }
    function precioGeneral ($precio, $conSin) {
        if ($conSin == "C") $precio = $precio+((21/100)*$precio);
        elseif ($conSin == "S") $precio = $precio-((21/100)*$precio);
        return $precio;
    }
    function precioConIVA (int|float $precio, string $IVA) :float|string {
        $IVA = strtoupper($IVA);
        if ($IVA == "SIN IVA") return $precio;
        elseif ($IVA == "SUPERREDICIDO") return precioSuperreducido($precio, "C");
        elseif ($IVA == "REDUCIDO") return precioReducido($precio, "C");
        elseif ($IVA == "GENERAL") return precioGeneral($precio, "C");
        else return "Error";
    }
    function precioSinIVA (int|float $precio, string $IVA) :float|string {
        $IVA = strtoupper($IVA);
        if ($IVA == "SIN IVA") return $precio;
        elseif ($IVA == "SUPERREDICIDO") return precioSuperreducido($precio, "S");
        elseif ($IVA == "REDUCIDO") return precioReducido($precio, "S");
        elseif ($IVA == "GENERAL") return precioGeneral($precio, "S");
        else return "Error";
    }
    ?>
    <form action="" method="post">
        <label>Precio</label>
        <br>
        <input type="number" step="1" id="precio" name="precio">
        <br><br>
        <label>IVA</label>
        <br>
        <input type="text" step="1" id="IVA" name="IVA">
        <br><br>
        <input type = "hidden" name ="action" value ="iva">
        <input type="submit" value="Calcular">
        <br><br>
    </form>

    <?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        if($_POST["action"] == "iva"){
            $precio = (int)$_POST["precio"];
            $IVA = (string)$_POST["IVA"];
            echo precioConIVA($precio, $IVA);
            echo precioSinIVA($precio, $IVA);
        }
    }
    ?>

<?php
    function potencia (int|float $base, int $exponente) {
        $resultado = 1;

        if ($exponente > 0) {
            for ($i = 1; $i <= $exponente; $i++) {
                $resultado *= $base;
            }
        } elseif ($exponente == 0) {
            $resultado = 1;
        } else {
            $resultado = 0;
        }
    };
    ?>

    <form action="" method="post">
        <label>Base</label>
        <br>
        <input type="number" id="base" name="base">
        <br><br>
        <label>Exponente</label>
        <br>
        <input type="number" id="exponente" name="exponente">
        <br><br>
        <input type = "hidden" name ="action" value ="potencia">
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST"){
        if($_POST["action"] == "potencia"){
            $base= (int)$_POST["base"];
            $exponente= (int)$_POST["exponente"];
            echo potencia($base, $exponente);
        }
    }
    ?>
</body>
</html>