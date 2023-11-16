<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enlaceID = $_POST["enlace_id"];


    $sqlEnlaces = "DELETE FROM enlaces WHERE enlaces_id = $enlaceID";
    

    $sqlRelProyectoEnlaces = "DELETE FROM rel_proyecto_enlaces WHERE enlaces_id = $enlaceID";


    $conexion->begin_transaction();


    if ($conexion->query($sqlRelProyectoEnlaces) === TRUE && $conexion->query($sqlEnlaces) === TRUE) {

        $conexion->commit();
        echo "success";
    } else {

        $conexion->rollback();
        echo "error";
    }
}
?>