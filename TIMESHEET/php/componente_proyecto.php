<?php
include 'conexion.php';
session_start();
$usuario_id = $_SESSION['usuario_id'];
$empleadoID = $_GET['id'];

$sql = "SELECT tipo FROM usuarios WHERE usuario_id = $usuario_id";
$result = $conexion->query($sql); // Realiza la consulta
$fila = $result->fetch_assoc(); // Obtiene el resultado de la consulta
$tipo = $fila["tipo"];

if($tipo == "administrador"){
    
    $sql = "SELECT proyecto_id, nombre, project_manager, fecha_inicio_ideal, fecha_fin_ideal FROM proyecto";
    $result = $conexion->query($sql); // Realiza la consulta correspondiente



    $cuadrosHTML = '';
    while ($row = $result->fetch_assoc()) {
        $proyectoID = $row['proyecto_id'];
        $cuadroHTML = '<a href="../Proyecto/proyecto.php?id=' . $proyectoID . '">';
        $cuadroHTML .= '<div class="proyecto-cuadro" data-proyecto-id="' . $proyectoID . '">';
        $cuadroHTML .= '<h3>' . $row['nombre'] . '</h3>';
        $cuadroHTML .= '<p>Project Manager: ' . $row['project_manager'] . '</p>';
        $cuadroHTML .= '<p>Fecha de Inicio: ' . $row['fecha_inicio_ideal'] . '</p>';
        $cuadroHTML .= '<p>Fecha de Fin: ' . $row['fecha_fin_ideal'] . '</p>';
        $cuadroHTML .= '</div>';
        $cuadroHTML .= '</a>';
        $cuadrosHTML .= $cuadroHTML; // Agrega los cuadros al resultado final
    }

    // Imprimir el código HTML generado
    echo $cuadrosHTML;
}else{
    $sql = "SELECT proyecto.proyecto_id, proyecto.nombre, proyecto.project_manager, proyecto.fecha_inicio_ideal, proyecto.fecha_fin_ideal FROM proyecto INNER JOIN rel_empleado_proyecto ON proyecto.proyecto_id = rel_empleado_proyecto.proyecto_id INNER JOIN empleado ON rel_empleado_proyecto.empleado_id = empleado.empleado_id WHERE empleado.empleado_id = '$empleadoID'";
    $result = $conexion->query($sql); // Realiza la consulta correspondiente
    
    
    $cuadrosHTML = '';
    while ($row = $result->fetch_assoc()) {
    $proyectoID = $row['proyecto_id'];
    $cuadroHTML = '<a href="../Proyecto/proyecto.php?id=' . $proyectoID . '">';
    $cuadroHTML .= '<div class="proyecto-cuadro" data-proyecto-id="' . $proyectoID . '">';
    $cuadroHTML .= '<h3>' . $row['nombre'] . '</h3>';
    $cuadroHTML .= '<p>Project Manager: ' . $row['project_manager'] . '</p>';
    $cuadroHTML .= '<p>Fecha de Inicio: ' . $row['fecha_inicio_ideal'] . '</p>';
    $cuadroHTML .= '<p>Fecha de Fin: ' . $row['fecha_fin_ideal'] . '</p>';
    $cuadroHTML .= '</div>';
    $cuadroHTML .= '</a>';
    $cuadrosHTML .= $cuadroHTML; // Agrega los cuadros al resultado final
    }
    
    // Imprimir el código HTML generado
    echo $cuadrosHTML;
}



   


?>
