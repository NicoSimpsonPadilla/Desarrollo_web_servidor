<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E1</title>
    <link rel="stylesheet" href="csspractica.css">
</head>
<body>
    <?php
    // TODO: E1
    echo "<h2>Ejercicio 1</h2>";
    $tablasM  = [];
    ?>
    <table>
        <thead>
            <tr>
                <th>Tabla del 1</th>
                <th>Tabla del 2</th>
                <th>Tabla del 3</th>
                <th>Tabla del 4</th>
                <th>Tabla del 5</th>
                <th>Tabla del 6</th>
                <th>Tabla del 7</th>
                <th>Tabla del 8</th>
                <th>Tabla del 9</th>
                <th>Tabla del 10</th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 1; $i <= 10; $i++) {
                $contArray = 0;
                echo "<tr>";
                for ($j = 1; $j <= 10; $j++) {
                    $tablasM[$contArray] = $i * $j;
                    echo "<td>$i x $j = $tablasM[$contArray]</td>";
                    $contArray++;
                }
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>