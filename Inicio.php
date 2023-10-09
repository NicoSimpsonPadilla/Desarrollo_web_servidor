<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <?php
    echo "<h1>Hola Mundo</h1>";
    ?>

    <h2>Que tal</h>

    <?php
    echo "<h3>Otro Hola Mundo<h3>";
    
    // comentario
    /*
    comentario
    */
    # comentario

    
    $entero = 1;        #int
    $decimal = 1.5;     # float
    $exponente = 3e5;   # float

    echo $exponente;
    
    echo "<br><br>";

    var_dump($exponente);

    echo "<br><br>";

    $string1 = "Hola";
    $string2 = 'Hola';

    echo "Texto: $string1";
    echo "<br>";
    echo 'Texto: $string1';
    echo "<br>";
    echo $string1 . " " . $string2;
    echo "<br>";

    echo "<h1>$string1</h1>";
    echo "<h1>" . $string1 . "</h1>";
    

    
    // TODO: ARRAYS
    echo "Array";
    echo "<br>";
    $array1 = [1,2,3];          # array de nuneros
    $array2 = ["a","b", "c"];   # array de letras
    $array3 = [1, "a", 2];      # array mixto
    var_dump($array1);
    echo "<br><br>";
    var_dump($array2);
    echo "<br><br>";
    var_dump($array3);
    
    echo "<br><br>";

    // TODO: BOOLEAN
    echo "Boolean";
    echo "<br>";
    $b = true;
    $c = false;
    var_dump($b);

    echo "<br><br>";

    define ("EDAD",25);
    echo EDAD;
    
    echo "<br><br>";

    //TODO: While
    echo "<h3>While</h3><br>";
    $i = 1 ;
    while ($i <= 10){
        echo $i++;
    }

    echo "<br><br>";

    //TODO: Do while
    echo "<h3>Do while</h3><br>";
    $i = 1;
    do {
        echo $i++;
    }while ($i <= 10);

    echo "<br><br>";

    //TODO: For
    echo "<h3>For</h3><br>";
    for ($i = 1; $i <= 10; $i++) {
        echo $i;
    }
    echo "<br>";
    for ($i = 1; ; $i++) {
        if ($i > 10) {
            break;
        }
    }
    echo $i;
    echo "<br>";
    for ($i = 1 ; $i <= 50 ; $i++):
        if ($i % 3 == 0 xor $i % 2 == 0) {
            echo "$i ";
        }
    endfor;
    
    echo "<br><br>";

    //TODO: Array Key
    echo "<h3>Array Key</h3><br>";
    $arrayKey = array (
        'key1' => 'value1',
        'key2' => 'value2',
        'key3' => 'value3'
    );
    array_push ($arrayKey, 'value4', 'value5');
    $arrayKey['key4'] = 'value4';
    $arrayKey['key3'] = 'value3';
    print_r ($arrayKey);
    
    echo "<br><br>";

    //TODO: Recorrer arrays
    echo "<h3>Recorrer arrays</h3><br>";
    $personas =  [
        "13212354G" => "Garcia",
        "23467443H" => "Cochi",
        "78965458L" => "Porras"
    ];
    echo "<ul>";
    foreach ($personas as $persona) {
        echo "<li>$persona</li>";
    }
    echo "</ul>";
    echo "<ul>";
    foreach ($personas as $dni => $nombre) {
        echo "<li>DNI: $dni, Nombre: $nombre</li>";
    }
    echo "</ul>";

    echo "<br><br>";

    //TODO: Arrays multudimensionales
    echo "<h3>Arrays multudimensionales</h3><br>";
    $juegos = [
        ["Pacman", "Atari", 60],
        ["Fornite", "PS4", 0],
        ["Mario kart", "Super Nintendo", 70],
        ["Street fighter", "PS4", 50],
        ["Legend od Zelda", "Nintendo 64", 40],
        ["Castelvania", "Nintendo 64", 55],
    ];
    foreach ($juegos as $juego) {
        list ($nombre, $consola, $precio) = $juego;
        echo "<li>$nombre, $consola, $precio</li>";
    }
    ?>

    <?php
    /*
    //TODO: Ejercicios

    //TODO: Ejercicio fecha
    echo "<h3>Ejercicio fecha</h3><br>";
    $dia = date("d");
    if ($dia <= 15) {
        echo "Estamos a principios de mes";
    } else {
        echo "Estamos a finales de mes";
    }
    
    echo "<br><br>";

    //TODO: Ejercicio hora
    echo "<h3>Ejercicio hora</h3><br>";
    $hora = date("H");
    if ($hora < "12") {
        echo "Buenos dias";
    } elseif ($hora < "20") {
        echo "Buenas tardes";
    } else {
        echo "Buenas noches";
    }

    echo "<br><br>";

    //TODO: Ejercicio valor aleatorio
    # Este ejercicio esta hecho con dos puntos en los ifs
    echo "<h3>Ejercicio valor aleatorio</h3><br>";
    $valor = rand(1,150);
    echo "El valor aleatorio es $valor <br>";
    if ($valor < 10):
        echo "El valor tiene un digito";
    elseif ($valor < 100):
        echo "El valor tiene dos digitos";
    else:
        echo "El valor tiene tres digitos";
    endif;  # importante ponerlo ya que este ejer. esta hecho con doble punto

    echo "<br><br>";

    //TODO: Ejercicio switch
    echo "<h3>Ejercicio switch</h3><br>";
    $n = rand (1,3);
    switch ($n) {
        case 1:
            echo "$n es igual a 1";
            break;
        case 2:
            echo "$n es igual a 2";
            break;
        default:
            echo "$n es igual a 3";
            break;
    }

    echo "<br><br>";

    //TODO: Ejercicio switch (clase)
    echo "<h3>Ejercicio switch (clase)</h3><br>";
    $dia = date("l");
    $dia_es = "";
    if ($dia == "Monday"):
        $dia_es = "Lunes";
    elseif ($dia == "Tusday"):
        $dia_es = "Martes";
    elseif ($dia == "Wednesday"):
        $dia_es = "Miercoles";
    elseif ($dia == "Thursday"):
        $dia_es = "Jueves";
    elseif ($dia == "Friday"):
        $dia_es = "Viernes";
    elseif ($dia == "Saturday"):
        $dia_es = "Sabado";
    else:
        $dia_es = "Domingo";
    endif;
    switch ($dia_es) {
        case "Lunes":
        case "Miercoles":
        case "Viernes":
            echo "Hoy $dia_es, hay clase";
            break;
        default:
            echo "Hoy $dia_es, no hay clase";
            break;
    }
    */
    ?>
</body>
</html>