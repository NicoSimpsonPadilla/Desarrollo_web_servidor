<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
    <link rel="stylesheet" href="Tabla_ejercicios.css">
</head>
<body>
<?php
    // TODO: E1
    echo "<h2>E1</h2>";
    $num = rand(1,10);
    if ($num%2 == 0):
        echo "El $num es par";
    else:
        echo "El $num es impar";
    endif;

    echo "<br><br>";

    // TODO: E2
    echo "<h2>E2</h2>";
    $num = rand(-10,10);
    if ($num >= 0):
        echo "El $num es positivo";
    else:
        echo "El $num es negativo";
    endif;

    echo "<br><br>";

    // TODO: E3
    echo "<h2>E3</h2>";
    $ndate = date("j");
    $date = date("n");
    $date_es = match($date) {   
    # Se usa el match() para convertir una
    # variable dependiendo de como es la otra
        "1" => "Enero",
        "2" => "Febrero",
        "3" => "Marzo",
        "4" => "Abril",
        "5" => "Mayo",
        "6" => "Junio",
        "7" => "Julio",
        "8" => "Agosto",
        "9" => "Septiembre",
        "10" => "Octubre",
        "11" => "Noviembre",
        default => "Diciembre",
    };
    echo "Hoy es dia $ndate de $date_es";

    echo "<br><br>";

    // TODO: E4
    echo "<h2>E4</h2>";
    $date = date("e");
    echo "La zona horaria es $date";
    ?>

    <br><br>

    <?php
    // TODO: E5
    echo "<h2>E5</h2>";
    ?>
    <ul>
    <?php
    for ($i = 1 ; $i <= 20 ; $i++) {
        if ($i % 2 != 0) {
            echo "<li>$i</li>";
        }
    }
    ?>
    </ul>

    <br>

    <?php
    $num = 0;
    for ($i = 1 ; $i <= 20 ; $i++) {
        if ($i % 2 == 0) {
            $num += $i;
        }
    }
    echo $num
    ?>

    <br><br>

    <?php
    // TODO: E6
    echo "<h2>E6</h2>";
    ?>
    <ul>
    <?php
    for ($i = 2 ; $i <= 50 ; $i++) {
        $primo = true;
        for ($j = 2 ; $j <= $i-1 && $primo; $j++) {
            if ($i % $j == 0) {
                $primo = false;
            }
        }
        if ($primo) {
            echo "<li>$i</li>";
        }
    }
    ?>
    </ul>

    <br><br>

    <?php
    // TODO: E7
    echo "<h2>E7</h2>";
    ?>
    <ol>
    <?php
    $cont = 1;
    for ($i = 2 ; $cont != 51 ; $i++) {
        $primo = true;
        for ($j = 2 ; $j <= $i-1 && $primo; $j++) {
            if ($i % $j == 0) {
                $primo = false;
            }
        }
        if ($primo) {
            echo "<li>$i</li>";
            $cont++;
        }
    }
    ?>
    </ol>

    <br><br>

    <?php
    // TODO: E8
    $personas = array (
        '12121212k' => 'Jose Maria',
        '23232323l' => 'Francisco',
        '34343434h' => 'Rodolfo'
    );
    ?>

    <br><br>

    <?php
    // TODO: E8.1
    echo "<h2>E8.1</h2>";
    ?>
    <h3>Tabla inicial</h3>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <h3>Tabla con Sort</h3>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //para no estropear personas
            $aux_personas = $personas;
            sort($aux_personas);
            foreach ($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    </table>
    <h3>Tabla con Ksort</h3>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //para no estropear personas
            $aux_personas = $personas;
            ksort($aux_personas);
            foreach ($aux_personas as $dni => $nombre) {
                echo "<tr>";
                echo "<td>$dni</td><td>$nombre</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <?php
    // TODO: E10
    echo "<h2>E10</h2>";
    $juegos = [
        ["Pacman", "Atari", 60],
        ["Fornite", "PS4", 0],
        ["Mario kart", "Super Nintendo", 70],
        ["Street fighter", "PS4", 50],
        ["Legend od Zelda", "Nintendo 64", 40],
        ["Castelvania", "Nintendo 64", 55],
    ];
    ?>
    <h3>Tabla Normal</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Consola</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($juegos as $juego) {
                list ($nombre, $consola, $precio) = $juego;
                echo "<tr>";
                echo "<td>$nombre</td>
                <td>$consola</td>
                <td>$precio</td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>
    <h3>Tabla Orden multisort</h3>
    <table>
        <thead>
            <tr>
                <th>Consola</th>
                <th>Nombre</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($juegos as $juego) {
                $c_nombre = array_column ($juegos, 0);
                $c_consola = array_column ($juegos, 1);
                $c_precio = array_column ($juegos, 2);

                array_multisort (
                $c_consola, SORT_ASC, 
                $c_nombre, SORT_ASC, 
                $juegos
                );

                list ($nombre, $consola, $precio) = $juego;
                echo "<tr>";
                echo "<td>$consola</td>
                <td>$nombre</td>
                <td>$precio</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <?php
    // TODO: E11
    echo "<h2>E11</h2>";
    $numPares = [];
    for ($i = 1 ; $i <= 50 ; $i++) {
        if ($i % 2 == 0) {
            array_push($numPares, $i);
        }
    }
    shuffle($numPares);
    print_r($numPares);
    ?>

    <br><br>

    <?php
    // TODO: E12
    echo "<h2>E12</h2>";
    $numAleatorios = [];
    for ($i = 0; $i < 10; $i++) {
        $num = rand(1,100);
        $numAleatorios[$i] = $num;
    }
    // De menor a mayor
    asort($numAleatorios);
    print_r($numAleatorios);
    // De mayor a menor
    arsort($numAleatorios);
    print_r($numAleatorios);
    ?>

    <?php
    // TODO: E13
    echo "<h2>E13</h2>";
    $paises = array( "Italy"=>"Rome", "Luxembourg" =>"Luxembourg" , "Belgium"=>
    "Brussels" , "Denmark"=>"Copenhagen" , "Finland"=>"Helsinki" , "France" =>
    "Paris", "Slovakia" =>"Bratislava" , "Slovenia" =>"Ljubljana" , "Germany" =>
    "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin",
    "Netherlands" =>"Amsterdam" , "Portugal" =>"Lisbon", "Spain"=>"Madrid",
    "Sweden"=>"Stockholm" , "United Kingdom" =>"London", "Cyprus"=>"Nicosia",
    "Lithuania" =>"Vilnius", "Czech Republic" =>"Prague", "Estonia"=>"Tallin",
    "Hungary"=>"Budapest" , "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" =>
    "Vienna", "Poland"=>"Warsaw");
    asort($paises);
    ?>

    <br><br>

    <table>
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>Pais</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($paises as $pais => $ciudad) {
                echo "<tr>";
                echo "<td>$pais</td><td>$ciudad </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <?php
    // TODO: E14
    echo "<h2>E14</h2>";
    $series = [
        ["Death note", "Netflix", 1],
        ["The witcher", "Netflix", 3],
        ["The boys", "Prime videos", 3],
        ["Games of thrones", "HBO", 8],
        ["The Mandalorian", "Disney+", 3],
    ];
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($series as $serie) {
                list ($titulo, $plataforma, $temporada) = $serie;
                echo "<tr>";
                echo "<td>$titulo</td>
                <td>$plataforma</td>
                <td>$temporada</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- como ordenarla por temp -->
    <h3>Por temporada</h3>
    <?php
    $temp = array_column($series, 2);
    array_multisort($temp, SORT_ASC, $series);
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($series as $serie) {
                list ($titulo, $plataforma, $temporada) = $serie;
                echo "<tr>";
                echo "<td>$titulo</td>
                <td>$plataforma</td>
                <td>$temporada</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <h3>Por plataforma</h3>
    <?php
    $plataforma = array_column($series, 1);
    $titulo = array_column($series, 1);
    array_multisort($plataforma, SORT_ASC, $titulo, SORT_ASC, $series);
    ?>

    <table>
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Plataforma</th>
                <th>Temporadas</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($series as $serie) {
                list ($titulo, $plataforma, $temporada) = $serie;
                echo "<tr>";
                echo "<td>$titulo</td>
                <td>$plataforma</td>
                <td>$temporada</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // TODO: E15
    echo "<h2>E15</h2>";
    $estudiantes  = [
        ["Paco", rand(0,10)],
        ["Paula", rand(0,10)],
        ["Gavi", rand(0,10)],
        ["Nacho", rand(0,10)],
        ["Alex", rand(0,10)],
    ];
    asort($estudiantes);
    ?>
    <table>
        <thead>
            <tr>
                <th>Alumno</th>
                <th>Nota</th>
                <th>Calificacion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $calificacion = "";
            foreach ($estudiantes as $estudiante) {
                list ($alumno, $nota) = $estudiante;
                $calificacion = match(true) {
                    $nota >= 0 && $nota < 5 => "Suspenso",
                    $nota >= 5 && $nota < 7 => "Aprobado",
                    $nota >= 7 && $nota < 9 => "Notable",
                    $nota >= 9 && $nota <= 10 => "Sobresaliente",
                    default => "Error"
                };
                echo "<tr>";
                echo "<td>$alumno</td>
                <td>$nota</td>
                <td>$calificacion</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>