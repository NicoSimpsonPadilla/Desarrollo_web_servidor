<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E1_practica2</title>
    <?php require('funciones_Practica2.php'); ?>
</head>
<body>
    <!-- Ejercicio 1 -->
    <h3>Ejercicio 1</h3>
    <form action="" method="post">
        <label>Dinero que desee cambiar</label>
        <br>
        <input type="number" step="0.01" id="dinero" name="dinero">
        <br><br>
        <fieldset>
            <legend>Divisa actual:</legend>

            <div>
                <input type="radio" id="e" name="divisaA" value="e" checked />
                <label for="e">Euros</label>
            </div>

            <div>
                <input type="radio" id="d" name="divisaA" value="d" />
                <label for="d">Dolares</label>
            </div>

            <div>
                <input type="radio" id="y" name="divisaA" value="y" />
                <label for="y">Yenes</label>
            </div>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Divisa que quiere convertir:</legend>
            <div>
                <input type="radio" id="e" name="divisaC" value="e" checked />
                <label for="e">Euros</label>
            </div>

            <div>
                <input type="radio" id="d" name="divisaC" value="d" />
                <label for="d">Dolares</label>
            </div>

            <div>
                <input type="radio" id="y" name="divisaC" value="y" />
                <label for="y">Yenes</label>
            </div>
        </fieldset>
        <br><br>
        <input type="submit" value="Cambiar">
        <br><br>
    </form>

    <?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $dinero = (int)$_POST["dinero"];
        $divisaA = (string)$_POST["divisaA"];
        $divisaC = (string)$_POST["divisaC"];
        
        echo (cambiarDivisa($dinero, $divisaA, $divisaC));
    }
    ?>
</body>
</html>