<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empleadoID = $_POST["empleado_id"];

    // Realiza la consulta para eliminar la relación en la tabla 'rel_empleado_proyecto'
    $sql = "DELETE FROM rel_empleado_proyecto WHERE empleado_id = $empleadoID";

    // Ejecuta la consulta para eliminar la relación
    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}
?>