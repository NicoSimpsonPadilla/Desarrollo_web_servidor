<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E2_practica2</title>
    <?php require('funciones_Practica2.php'); ?>
</head>
<body>
    <!-- Ejercicio 2 -->
    <h3>Ejercicio 2</h3>
    <form action="" method="post">
        <label>Numero: </label>
        <br>
        <input type="number" step="1" id="numero" name="numero">
        <br><br>
        <select name="opcion">
            <option id="s" value="s" selected>Sumatorio</option>
            <option id="f" value="f">Factorial</option>
        </select>
        <br><br>
        <input type="submit" value="Calcular">
        <br><br>
    </form>

    <?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $numero = (int)$_POST["numero"];
        $opcion = (string)$_POST["opcion"];
        
        if ($opcion == "s") {
            echo (sumatorio($numero));
        } else {
            echo (factorial($numero));
        }
    }
    ?>
</body>
</html>