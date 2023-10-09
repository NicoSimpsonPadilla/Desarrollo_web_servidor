<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario_Comparacion</title>
</head>
<body>
    <?php
    function comparar (int $num1, int $num2, 
    int $num3) : string {
        if ($num1 == $num2 && $num1 == $num3) {
            return "Los tres números son iguales";
        } else {
            $candidato = $num1;

            if ($num2 > $num1) {
                $candidato = $num2;
            }
            if ($num3 > $num1) {
                $candidato = $num3;
            }
            return "El número mayor es: $candidato";
        }
    }
    ?>

    <form action="" method="post">
        <label>Numero 1</label>
        <br>
        <input type="number" step="1" id="n1" name="n1">
        <br><br>
        <label>Numero 2</label>
        <br>
        <input type="number" step="1" id="n2" name="n2">
        <br><br>
        <label>Numero 3</label>
        <br>
        <input type="number" step="1" id="n3" name="n3">
        <br><br>
        <input type="submit" value="Comparar">
        <br><br>
    </form>

    <?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $n1= (int)$_POST["n1"];
        $n2= (int)$_POST["n2"];
        $n3= (int)$_POST["n3"];
        echo comparar($n1, $n2, $n3);
    }
    ?>
</body>
</html>