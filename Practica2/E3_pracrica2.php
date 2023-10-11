<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E3_pracrica2</title>
    <link rel="stylesheet" href="estilos.css">
    <?php require('funciones_Practica2.php'); ?>
</head>
<body>
    <?php
    $animales = [
        ["Lobo ibérico", "Mamífero", 2500],
        ["Lince ibérico", "Mamífero", 1668],
        ["Quebrantahuesos", "Ave", 2000],
        ["Oso pardo", "Mamífero", 500]
        ]

    ?>
    <table>
        <thead>
            <tr>
                <th>Especie</th>
                <th>Ejemplares</th>
                <th>Clase</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($animales as $animal) {
                list ($especieF, $ejemplaresF, $claseF) = $animal;
                $estado = comprobarEstado($claseF);
                echo "<tr>";
                echo "<td>$especieF</td>
                <td>$ejemplaresF</td>
                <td>$claseF</td>
                <td>$estado</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <br><br>

    <form action="" method="post">
        <label>Especie: </label>
        <input type="text" id="especie" name="especie">
        <br><br>
        <input type="submit" value="Comprobar">
        <br><br>
    </form>

    <?php
    if ($_SERVER ["REQUEST_METHOD"] == "POST") {
        $especie = (string)$_POST["especie"];
        
        foreach ($animales as $animal) {
            list ($especieF, $ejemplaresF, $claseF) = $animal;
            $estado = comprobarEstado($claseF);
            
            if ($especieF == $especie) {
                echo ("$especieF está $estado");
            }
        }
    }
    ?>
</body>
</html>