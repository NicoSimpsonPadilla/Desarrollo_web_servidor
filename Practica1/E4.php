<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E4</title>
    <link rel="stylesheet" href="csspractica.css">
</head>
<body>
<?php
    // TODO: E4
    echo "<h2>Ejercicio 4</h2>";
    $arrayMultidimensional = [];
    $array1 = [];
    $array2 = [];
    for  ($i = 0; $i < 10; $i++) {
        $array1[$i] = rand(1,10);
        $array2[$i] = rand(10,100);
    }
    for  ($i = 0; $i < 2; $i++) {
        for  ($j = 0; $j < 10; $j++) {
            if ($i == 0){
                $arrayMultidimensional[$j][$i] = $array1[$j];
            } else {
                $arrayMultidimensional[$j][$i] = $array2[$j];
            }
        }
    }
    ?>

    <table>
        <thead>
            <tr>
                <th>Array 1</th>
                <th>Array 2</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arrayMultidimensional as $f_arrayMultidimensional) {
                list ($f_array1, $f_array2) = $f_arrayMultidimensional;
                echo "<tr>";
                echo "<td>$f_array1</td>
                <td>$f_array2</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <?php
    $valorMax1 = $array1[0];
    $valorMin1 = $array1[0];
    $media1 = 0;
    for ($i = 0; $i < 10; $i++) {
        if ($array1[$i] > $valorMax1) {
            $valorMax1 = $array1[$i];
        }
        if ($array1[$i] < $valorMin1){
            $valorMin1 = $array1[$i];
        }
        $media1 += $array1[$i];
    }
    $media1 /= 10;
    $valorMax2 = $array2[0];
    $valorMin2 = $array2[0];
    $media2 = 0;
    for ($i = 0; $i < 10; $i++) {
        if ($array2[$i] > $valorMax2) {
            $valorMax2 = $array2[$i];
        }
        if ($array2[$i] < $valorMin2){
            $valorMin2 = $array2[$i];
        }
        $media2 += $array2[$i];
    }
    $media2 /= 10;
    echo "<h3>En el 1º array el max es: $valorMax1, el min es: $valorMin1 y la media es $media1.</h3>";
    echo "<h3>En el 2º array el max es: $valorMax2, el min es: $valorMin2 y la media es $media2.</h3>";
    ?>
</body>
</html>