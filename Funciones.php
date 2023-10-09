<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
    <link rel="stylesheet" href="Tabla_ejercicios.css">
</head>
<body>
    <?php
    function sumaDosV1 ($num1, $num2) {
        // Instrucciones
        return $num1 + $num2;
    }

    // Solo aceptara numeros enteros
    function sumaDosV2 (int $num1, int $num2) {
        // Instrucciones
        return $num1 + $num2;
    }

    // Suma un entero con un decimal
    function sumaDosV3 (int|float $num1, int|float $num2) {
        // Instrucciones
        return $num1 + $num2;
    }

    // Te redondea el numero
    function sumaDosV4 (int|float $num1, int|float $num2) : int{
        // Instrucciones
        return $num1 + $num2;
    }

    $resultado = sumaDosV4 (1.5,3);
    echo "<h3>Resultado 1: $resultado</h3>";
    echo "<h3>Resultado 2: " . sumaDosV1(3,5) . "</h3>";

    // TODO: Ejercicio 1 Nota
    echo "<h2>Ejercicio 1</h2>";

    function obtenerCalificacion (int|float $p_nota) : string {
        $calificacion = match(true) {
            $p_nota >= 0 && $p_nota < 5 => "Suspenso",
            $p_nota >= 5 && $p_nota < 7 => "Aprobado",
            $p_nota >= 7 && $p_nota < 9 => "Notable",
            $p_nota >= 9 && $p_nota <= 10 => "Sobresaliente",
            default => "Error"
        };
        return $calificacion;
    }
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
            foreach ($estudiantes as $estudiante) {
                list ($alumno, $nota) = $estudiante;
                echo "<tr>";
                echo "<td>$alumno</td>
                <td>$nota</td>
                <td>" . obtenerCalificacion($nota) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <?php
    // TODO: Ejercicio 2 Primos
    //Numeros primos
    echo "<h2>Ejercicio 2</h2>";

    function numerosPrimos (int $limite) {
        for ($i = 2 ; $i <= $limite ; $i++) {
            $primo = true;
            for ($j = 2 ; $j <= $i-1 && $primo; $j++) {
                if ($i % $j == 0) {
                    $primo = false;
                }
            }
            if ($primo) echo "$i ";
        }
    }
    numerosPrimos(75);

    // TODO: Ejercicio 3 Primos
    //Numeros primos con array
    echo "<h2>Ejercicio 3</h2>";
    
    function numerosPrimosV2 (int $limite) : array{
        $primos = [];
        for ($i = 2 ; $i <= $limite ; $i++) {
            $primo = true;
            for ($j = 2 ; $j <= $i-1 && $primo; $j++) {
                if ($i % $j == 0) {
                    $primo = false;
                }
            }
            if ($primo) array_push($primos, $i);
        }
        return $primos;
    }
    echo "Mira codigo";

    // TODO: Ejercicio 4 Primos
    //Numeros primos con array simplificado con funcion boolean
    echo "<h2>Ejercicio 4</h2>";
    
    function numerosPrimosV3 (int $limite) : array{
        $primos = [];
        for ($i = 2 ; $i <= $limite ; $i++) {
            if (esPrimo($i)) array_push($primos, $i);
        }
        return $primos;
    }

    function esPrimo(int $numero) : bool {
        $primo = true;
        for ($j = 2 ; $j <= $numero-1 && $primo; $j++) {
            if ($numero % $j == 0) {
                $primo = false;
            }
        }
        return $primo;
    }
    echo "Mira codigo";

    // TODO: Ejercicio 5 Cambio temperatura
    echo "<h2>Ejercicio 5</h2>";

    function celsiusAFahrenheit (int|float $numero) : float {
        return ($numero * 9 / 5) + 32 ;
    }
    function FahrenheitACelsius (int|float $numero) : float {
        return ($numero - 32) * 5 / 9;
    }
    function celsiusAKelvin (int|float $numero) : float {
        return $numero + 273.15;
    }
    function kelvinACelsius (int|float $numero) : float {
        return $numero - 273.15;
    }
    function kelvinAFahrenheit (int|float $numero) : float {
        return ($numero - 273.15) * 9 / 5 + 32;
    }
    function FahrenheitAKelvin (int|float $numero) : float {
        return ($numero - 32) * 5 / 9 + 273.15;
    }

    function convertit (int|float $temp, string $u1, string $u2) {
        $u1 = strtoupper($u1); 
        $u2 = strtoupper($u2);
        if ($u1 == "C" && $u2 == "F") return celsiusAFahrenheit($temp);
        elseif ($u1 == "F" && $u2 == "C") return FahrenheitACelsius($temp);
        elseif ($u1 == "C" && $u2 == "K") return celsiusAKelvin($temp);
        elseif ($u1 == "K" && $u2 == "C") return kelvinACelsius($temp);
        elseif ($u1 == "K" && $u2 == "F") return kelvinAFahrenheit($temp);
        elseif ($u1 == "F" && $u2 == "K") return FahrenheitAKelvin($temp);
        else return "Error";
    }
    echo "Mira codigo";

    // TODO: Ejercicio 6 Potencia
    echo "<h2>Ejercicio 6</h2>";

    function potencia (int $base, int $exponente) : int {
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
        return $resultado;
    }
    echo "<h3>" . potencia(5,2) . "</h3>";

    // TODO: Ejercicio 7 IVA
    echo "<h2>Ejercicio 7</h2>";

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
    echo "<h3>" . precioSinIVA(34,"general") . "</h3>";
    echo "<h3>" . precioSinIVA(34,"reducido") . "</h3>";

    // TODO: Ejercicio 8 IRPF
    echo "<h2>Ejercicio 8</h2>";

    function salarioSinIRPF (float | int $salario) : float {
        $salario_final;
        $tramo1 = (12450 * 0.19);
        $tramo2 = ((20200 - 12450) * 0.24);
        $tramo3 = ((35200 - 20200) * 0.30);
        $tramo4 = ((60000 - 35200) * 0.37);
        $tramo5 = ((300000 - 60000) * 0.45);

        if($salario <= 12450) {
            $salario_final = $salario - ($salario * 0.19);
        } elseif ($salario > 12450 && $salario <= 20200) {
            $salario_final = $salario 
                - $tramo1 
                - (($salario - 12450) * 0.24); 
        } elseif ($salario > 20200 && $salario <= 35200) {
            $salario_final = $salario
                - $tramo1
                - $tramo2
                - (($salario - 20200) * 0.30);
        } elseif ($salario > 35200 && $salario <= 60000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - (($salario - 35200) * 0.37);
        } elseif ($salario > 60000 && $salario <= 300000) {
            $salario_final = $salario 
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - (($salario - 60000) * 0.45);
        } else {
            $salario_final = $salario
                - $tramo1
                - $tramo2 
                - $tramo3
                - $tramo4
                - $tramo5
                - (($salario - 300000) * 0.47);
        }
        return $salario_final;
    }

    echo salarioSinIRPF(400000);
    ?>
</body>
</html>