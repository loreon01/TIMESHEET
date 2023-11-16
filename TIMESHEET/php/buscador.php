<?php
include 'conexion.php';
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    $sql = "SELECT empleado_id, nombre, apellido FROM empleado WHERE nombre LIKE '%$query%' OR apellido LIKE '%$query%'";
    $result = $conexion->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row['empleado_id'];
                $nombre = $row['nombre'];
                $apellido = $row['apellido'];
                echo "<a href='../php/agregar_empleado.php?id=$id&nombre=$nombre&apellido=$apellido'>$nombre $apellido</a><br>";
            }
        } else {
            echo "No se encontraron resultados.";
        }
    } else {
        echo "Error en la consulta: " . $mysqli->error;
    }
}

?>