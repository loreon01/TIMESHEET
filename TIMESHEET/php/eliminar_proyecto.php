<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se proporcionó la ID del proyecto en la URL
if (isset($_GET['id'])) {
    $proyectoID = $_GET['id'];

    // Iniciar una transacción para asegurar la consistencia de los datos
    $conexion->begin_transaction();

    try {
        // Eliminar datos de la tabla 'rel_empleado_proyecto'
        $sql1 = "DELETE FROM rel_empleado_proyecto WHERE proyecto_id = $proyectoID";
        $conexion->query($sql1);

        // Eliminar datos de la tabla 'rel_proyecto_enlaces'
        $sql2 = "DELETE FROM rel_proyecto_enlaces WHERE proyecto_id = $proyectoID";
        $conexion->query($sql2);

        // Obtener los IDs de los enlaces asociados al proyecto desde 'rel_proyecto_enlaces'
        $sql3 = "SELECT enlaces_id FROM rel_proyecto_enlaces WHERE proyecto_id = $proyectoID";
        $result = $conexion->query($sql3);

        // Eliminar datos de la tabla 'enlaces' basado en los IDs obtenidos
        while ($row = $result->fetch_assoc()) {
            $enlaceID = $row['enlaces_id'];
            $sql4 = "DELETE FROM enlaces WHERE id = $enlaceID";
            $conexion->query($sql4);
        }

        // Eliminar datos de la tabla 'proyecto'
        $sql5 = "DELETE FROM proyecto WHERE proyecto_id = $proyectoID";
        $conexion->query($sql5);

        // Finalizar la transacción
        $conexion->commit();

        echo "Proyecto y datos relacionados eliminados con éxito";
        header("Location: ../Menu/menu.php");
        exit();
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conexion->rollback();
        echo "Error al eliminar el proyecto y datos relacionados: " . $e->getMessage();
    }

} else {
    echo "Error: ID de proyecto no proporcionada.";
}
?>