<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enlaceID = $_POST["enlace_id"];

    // Realiza la consulta para eliminar el enlace en la tabla 'enlaces'
    $sqlEnlaces = "DELETE FROM enlaces WHERE enlaces_id = $enlaceID";
    
    // Realiza la consulta para eliminar la relación en la tabla 'rel_proyecto_enlaces'
    $sqlRelProyectoEnlaces = "DELETE FROM rel_proyecto_enlaces WHERE enlaces_id = $enlaceID";

    // Inicia una transacción para asegurar la consistencia de ambas eliminaciones
    $conexion->begin_transaction();

    // Ejecuta ambas consultas dentro de la transacción
    if ($conexion->query($sqlRelProyectoEnlaces) === TRUE && $conexion->query($sqlEnlaces) === TRUE) {
        // Confirma la transacción si ambas consultas se ejecutan correctamente
        $conexion->commit();
        echo "success";
    } else {
        // Revierte la transacción si alguna de las consultas falla
        $conexion->rollback();
        echo "error";
    }
}
?>