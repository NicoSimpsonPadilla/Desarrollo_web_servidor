<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E3</title>
    <link rel="stylesheet" href="csspractica.css">
</head>
<body>
<?php
    // TODO: E3
    echo "<h2>Ejercicio 3</h2>";
    $cuadrados = [];
    $raiz = [];
    $cont = 0;
    for ($i = 1; $cont < 50; $i++) {
        $cuadrados[$cont] = $i * $i;
        $raiz[$cont] = $i;
        $cont++;
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Raiz</th>
                <th>Cuadrado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < count($raiz); $i++) {
                echo "<tr>";
                echo "<td>$raiz[$i]</td>
                <td>$cuadrados[$i]</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>