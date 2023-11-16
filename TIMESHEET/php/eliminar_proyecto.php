<?php

include 'conexion.php';


if (isset($_GET['id'])) {
    $proyectoID = $_GET['id'];


    $conexion->begin_transaction();

    try {

        $sql1 = "DELETE FROM rel_empleado_proyecto WHERE proyecto_id = $proyectoID";
        $conexion->query($sql1);


        $sql2 = "DELETE FROM rel_proyecto_enlaces WHERE proyecto_id = $proyectoID";
        $conexion->query($sql2);


        $sql3 = "SELECT enlaces_id FROM rel_proyecto_enlaces WHERE proyecto_id = $proyectoID";
        $result = $conexion->query($sql3);


        while ($row = $result->fetch_assoc()) {
            $enlaceID = $row['enlaces_id'];
            $sql4 = "DELETE FROM enlaces WHERE id = $enlaceID";
            $conexion->query($sql4);
        }


        $sql5 = "DELETE FROM proyecto WHERE proyecto_id = $proyectoID";
        $conexion->query($sql5);


        $conexion->commit();

        echo "Proyecto y datos relacionados eliminados con éxito";
        header("Location: ../Menu/menu.php");
        exit();
    } catch (Exception $e) {

        $conexion->rollback();
        echo "Error al eliminar el proyecto y datos relacionados: " . $e->getMessage();
    }

} else {
    echo "Error: ID de proyecto no proporcionada.";
}
?>