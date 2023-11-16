<?php
    include 'conexion.php';
    $proyectoID = $_POST['id'];
    $nombre = $_POST['nombre_archivo'];
    $link = $_POST['link'];
    
    $query = "INSERT INTO `enlaces`(`nombre`, `link`) VALUES ('$nombre', '$link')";
    $ejecutar = mysqli_query($conexion, $query);
    $enlaces_id = mysqli_insert_id($conexion);
    $query2 = "INSERT INTO `rel_proyecto_enlaces`(`enlaces_id`, `proyecto_id`) VALUES ('$enlaces_id', '$proyectoID')";
    $ejecutar = mysqli_query($conexion, $query2);
    echo '
    <script>
        window.location= "../Proyecto/proyecto.php?id='.$proyectoID.'"
    </script>
    ';
?>