<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empleadoID = $_POST["empleado_id"];

 
    $sql = "DELETE FROM rel_empleado_proyecto WHERE empleado_id = $empleadoID";


    if ($conexion->query($sql) === TRUE) {
        echo "success";
    } else {
        echo "error";
    }
}
?>