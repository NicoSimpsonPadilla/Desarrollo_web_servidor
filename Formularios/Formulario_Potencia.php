<!-- no va -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario_Potencia</title>
</head>
<body>
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
        <input type="submit" value="Calcular">
    </form>

    <?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST"){
        $base= (int)$_POST["base"];
        $exponente= (int)$_POST["exponente"];
        echo potencia($base, $exponente);
    }
    ?>
</body>
</html>