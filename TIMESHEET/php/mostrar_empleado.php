<?php
include 'conexion.php';

$proyectoID = $_GET['id'];
$sql = "SELECT empleado.empleado_id,empleado.nombre, empleado.apellido FROM empleado INNER JOIN rel_empleado_proyecto ON empleado.empleado_id=rel_empleado_proyecto.empleado_id INNER JOIN proyecto ON rel_empleado_proyecto.proyecto_id=proyecto.proyecto_id  WHERE proyecto.proyecto_id=$proyectoID ";
$result = $conexion->query($sql);

$empleados = '';
while ($row = $result->fetch_assoc()) {
    $empleadoID = $row['empleado_id'];
    $empleados .= '<div class="nombre_empleado">';
    $empleados .= '<p>' . $row['nombre'] .' '.$row['apellido']. '</p>';
    $empleados .= '<button class="eliminar-empleado" data-empleadoid="' . $empleadoID . '">Eliminar</button>'; 
    $empleados .= '</div>';
}

echo $empleados;
?>