<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DNI</title>
</head>
<body>
    <form action="formulario_control_1.php" method="post">
        <label for="DNI">DNI</label>
        <input type="text" id="dni" name="dni"
        pattern="[0-9]{8}[A-Za-z]{1}" title="El DNI tiene 8 dígitos y 
        una letra"><br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>