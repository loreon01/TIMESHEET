<?php
include 'conexion.php';

$proyectoID = $_GET['id'];
$id = $_GET['id'];
$nombre = $_GET['nombre'];
$apellido = $_GET['apellido'];


$verificarQuery = "SELECT * FROM `rel_empleado_proyecto` WHERE `empleado_id` = ? AND `proyecto_id` = ?";
$verificarStmt = mysqli_prepare($conexion, $verificarQuery);
mysqli_stmt_bind_param($verificarStmt, "ii", $id, $proyectoID);
mysqli_stmt_execute($verificarStmt);
mysqli_stmt_store_result($verificarStmt);

if (mysqli_stmt_num_rows($verificarStmt) > 0) {
    
    echo 'La relación ya existe.';
    echo '
    <script>
        window.location= "../Proyecto/proyecto.php?id='.$proyectoID.'"
    </script>
    ';
} else {

    $query = "INSERT INTO `rel_empleado_proyecto`(`empleado_id`, `proyecto_id`) VALUES (?, ?)";
    $insertStmt = mysqli_prepare($conexion, $query);
    mysqli_stmt_bind_param($insertStmt, "ii", $id, $proyectoID);
    $ejecutar = mysqli_stmt_execute($insertStmt);

    if ($ejecutar) {
        echo '
        <script>
            window.location= "../Proyecto/proyecto.php?id='.$proyectoID.'"
        </script>
        ';
    } else {

        echo 'Error al insertar la relación.';
    }
}

mysqli_stmt_close($verificarStmt);
mysqli_stmt_close($insertStmt);
mysqli_close($conexion);
?>