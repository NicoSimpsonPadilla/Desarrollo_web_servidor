<?php
    require 'database_conection.php';
    if(!isset($_GET["id_comic"])) header('location: index.php');

    $id = $_GET["id_comic"];
    $sql = $_conexion -> prepare("DELETE FROM comics 
    WHERE id_comic = $id");
    $sql -> execute();
    header('location: index.php');

?>