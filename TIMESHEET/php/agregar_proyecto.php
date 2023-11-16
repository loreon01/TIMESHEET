<?php
session_start();
$usuario_id = $_SESSION['usuario_id'];
include 'conexion.php';

// Obtener los datos del formulario
$nombre = $_POST['nombre_proyecto'];
$project_manager = $_POST['project_manager'];
$tipo = $_POST['tipo'];
$responsable_comercial = $_POST['responsable_comercial'];
$responsable_gestion = $_POST['responsable_gestion'];
$fecha_fin_ideal = $_POST['fecha_fin_ideal'];
$fecha_inicio_ideal = $_POST['fecha_inicio_ideal'];
$fecha_fin_real = $_POST['fecha_fin_real'];
$fecha_inicio_real = $_POST['fecha_inicio_real'];

// Insertar los datos del proyecto en la base de datos
$query = "INSERT INTO `proyecto` (`project_manager`, `nombre`, `tipo`, `responsable_comercial`, `responsable_de_gestion`, `fecha_inicio_real`, `fecha_inicio_ideal`, `fecha_fin_real`, `fecha_fin_ideal`) VALUES ('$project_manager', '$nombre', '$tipo', '$responsable_comercial', '$responsable_gestion', '$fecha_inicio_real', '$fecha_inicio_ideal', '$fecha_fin_real', '$fecha_fin_ideal')";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    $proyecto_id = mysqli_insert_id($conexion);

    $query2 = "INSERT INTO `rel_empleado_proyecto` (`empleado_id`, `proyecto_id`) VALUES ('$usuario_id', '$proyecto_id')";
    $ejecutar2 = mysqli_query($conexion, $query2);

    if ($ejecutar2) {
        echo "Proyecto creado con éxito.<br>";
        header("location: ../Menu/menu.php?id=$usuario_id");
    } else {
        echo "Error al crear la relación entre empleado y proyecto: " . $mysqli->error;
    }
} else {
    echo "Error al crear el proyecto: " . $mysqli->error;
}
?>

