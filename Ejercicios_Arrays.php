<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios_Arrays</title>
    <link rel="stylesheet" href="Tabla_ejercicios.css">
</head>
<body>
    <h2>Ejercicio 1</h2>
    <?php
    // TODO: Ejercicio 1
    $almacen  = [
        ["Camiseta", 15],
        ["Calcetines", 7],
        ["Sudadera", 35],
        ["Polo", 20],
        ["Baqueros", 25],
    ];
    asort($almacen);
    ?>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $precioTotal = 0;
            $contProduct = 0;
            foreach ($almacen as $f_almacen) {
                list ($producto, $precio) = $f_almacen;
                $precioTotal += $precio;
                $contProduct++;
                echo "<tr>";
                echo "<td>$producto</td>
                <td>$precio</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <?php
                echo "<td>Nº productos: $contProduct</td>
                <td>Precio total: $precioTotal</td>"
                ?>
            </tr>
        </tbody>
    </table>

    <h2>Ejercicio 2</h2>
    <?php
    // TODO: Ejercicio 2
    $almacen[0][2] = 32;
    $almacen[1][2] = 21;
    $almacen[2][2] = 46;
    $almacen[3][2] = 12;
    $almacen[4][2] = 29;
    for ($i = 0; $i < count($almacen); $i++) {
        $almacen[$i][3] = $almacen[$i][1]*$almacen[$i][2];
    }
    ?>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad vendida</th>
                <th>Dinero ganado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $precioTotal = 0;
            $cantidadTotal = 0;
            $dineroTotal = 0;
            $contProduct = 0;
            foreach ($almacen as $f_almacen) {
                list ($producto, $precio, $cantidad, $total) = $f_almacen;
                $precioTotal += $precio;
                $cantidadTotal += $cantidad;
                $dineroTotal += $total;
                $contProduct++;
                echo "<tr>";
                echo "<td>$producto</td>
                <td>$precio</td>
                <td>$cantidad</td>
                <td>$total</td>";
                echo "</tr>";
            }
            ?>
            <tr>
                <?php
                echo "<td>Nº productos: $contProduct</td>
                <td>Precio total: $precioTotal</td>
                <td>Total vendido: $cantidadTotal</td>
                <td>Total dinero: $dineroTotal</td>"
                ?>
            </tr>
        </tbody>
    </table>

    <h2>Ejercicio 3</h2>
    <?php
    // TODO: Ejercicio 3
    $numerosRandoms = [];
    for ($i = 0; $i <= 50; $i++) {
        $numerosRandoms[$i] = rand(1, 50);
        if ($numerosRandoms[$i]%3 == 0){
            unset($numerosRandoms[$i]);
        }
    }
    print_r($numerosRandoms);
    ?>

    <h2>Ejercicio 4</h2>
    <?php
    // TODO: Ejercicio 4
    $personas = [
        ["Paco", "Carbajal", rand(0,100)],
        ["Adri", "Fernandez", rand(0,100)],
        ["Alvaro", "Sanchez", rand(0,100)],
        ["Cristina", "Perez", rand(0,100)],
        ["Elena", "Gomez", rand(0,100)],
        ["Paula", "Garcia", rand(0,100)],
    ];
    ?>

<table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th colspan="2">Edad</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $edad2 = "";
            foreach ($personas as $persona) {
                list ($nombre, $apellido, $edad) = $persona;
                $edad2 = match(true) {
                    $edad >= 0 && $edad < 19 => "Menor de edad",
                    $edad >= 19 && $edad < 66 => "Mayor de edad",
                    $edad >= 65 && $edad <= 100 => "Jubilado",
                    default => "Error"
                };
                echo "<tr>";
                echo "<td>$nombre</td>
                <td>$apellido</td>
                <td>$edad</td>
                <td>$edad2</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h2>Ejercicio 4</h2>
    <?php
    // TODO: Ejercicio 4
    $personasDNI  = [
        ["Paco", "43567654K"],
        ["Paula", "468J"],
        ["Gavi", "47532578L"],
        ["Nacho", "5673G"],
        ["Alex", "45674876I"],
    ];
    ?>

<table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th colspan="2">DNI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $correcto = "";
            foreach ($personasDNI as $personaDNI) {
                list ($nombre, $DNI) = $personaDNI;
                $correcto = match(true) {
                    strlen($DNI) == 9=> "Correcto",
                    default => "Incorrecto"
                };
                echo "<tr>";
                echo "<td>$nombre</td>
                <td>$DNI</td>
                <td>$correcto</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>