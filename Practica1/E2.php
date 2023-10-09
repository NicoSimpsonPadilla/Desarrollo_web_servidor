<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E2</title>
    <link rel="stylesheet" href="csspractica.css">
</head>
<body>
<?php
    // TODO: E2
    echo "<h2>Ejercicio 2</h2>";
    $temperaturas = [
        ["Málaga", 20, 27],
        ["Sevilla", 17, 36],
        ["Cádiz", 19, 31],
        ["Jaén", 19, 33],
        ["Granada", 12, 35],
        ["Almería", 20, 27],
        ["Huelva", 16, 33]
        ];
        for ($i = 0; $i < count($temperaturas); $i++) {
            $temperaturas[$i][3] = ($temperaturas[$i][1]+$temperaturas[$i][2])/2;
        }
        
        $minimaOrden = array_column($temperaturas, 1);
        $ciudadOrden = array_column($temperaturas, 0);
        array_multisort($minimaOrden, SORT_ASC, $ciudadOrden, SORT_ASC, $temperaturas);
    ?>

    <table>
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Temperatura minima</th>
                <th>Temperatura maxima</th>
                <th>Temperatura media</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($temperaturas as $temperatura) {
                list ($ciudad, $tmpMinima, $tmpMaxima, $media) = $temperatura;
                echo "<tr>";
                echo "<td>$ciudad</td>
                <td>$tmpMinima</td>
                <td>$tmpMaxima</td>
                <td>$media</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $mediaMin = 0;
    $mediaMax = 0;
    for ($i = 0; $i < count($temperaturas); $i++) {
        $mediaMin += $temperaturas[$i][1];
        $mediaMax += $temperaturas[$i][2];
    }
    $mediaMin /= 7;
    $mediaMax /= 7;
    echo "<h3>La media minima es: $mediaMin y la maxima es: $mediaMax</h3>"
    ?>
</body>
</html>