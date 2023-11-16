<?php
    include 'conexion.php';
    $proyectoID = $_GET['id'];
    $id = $_GET['id'];
    $nombre = $_GET['nombre'];
    $apellido = $_GET['apellido'];
    
    $query = "INSERT INTO `rel_empleado_proyecto`(`empleado_id`, `proyecto_id`) VALUES ('$id', '$proyectoID')";
    $ejecutar = mysqli_query($conexion, $query);

    echo '
    <script>
        window.location= "../Proyecto/proyecto.php?id='.$proyectoID.'"
    </script>
    ';
?>