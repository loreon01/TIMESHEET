<?php
include 'conexion.php';

$proyectoID = $_GET['id'];
$sql = "SELECT enlaces.enlaces_id, enlaces.nombre, enlaces.link FROM enlaces INNER JOIN rel_proyecto_enlaces ON enlaces.enlaces_id=rel_proyecto_enlaces.enlaces_id INNER JOIN proyecto ON rel_proyecto_enlaces.proyecto_id=proyecto.proyecto_id  WHERE proyecto.proyecto_id=$proyectoID ";
$result = $conexion->query($sql);

$archivos = '';
while ($row = $result->fetch_assoc()) {
    $link = $row['link'];
    $enlaceID = $row['enlaces_id'];

    $archivos .= '<div class="nombre_archivos">';
    $archivos .= '<a href="' . $link . '" target="_blank">';
    $archivos .= '<p>' . $row['nombre'] . '</p>';
    $archivos .= '</a>';
    $archivos .= '<button class="eliminar" data-enlaceid="' . $enlaceID . '">Eliminar</button>';
    $archivos .= '</div>';
}

echo $archivos;
?>
