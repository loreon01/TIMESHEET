<?php
include 'conexion.php';
if (isset($_GET['id'])) {
    $proyectoID = $_GET['id'];
    
    // Realizar la consulta SQL usando la ID del proyecto
    $sql = "SELECT * FROM proyecto WHERE proyecto_id = $proyectoID";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los datos del proyecto
        
        while ($row = $result->fetch_assoc()) {
            echo '<h1 class="nombre-proyecto">' . $row["nombre"] . '</h1>';
            echo '<div class="proyecto-info">';
            echo '<p class="project-manager">Project Manager: ' . $row["project_manager"] . '</p>';
            echo '<p class="project-tipo">Tipo: ' . $row["tipo"] . '</p>';
            echo '<p class="project-fecha-inicio-ideal">Inicio Ideal: ' . $row["fecha_inicio_ideal"] . '</p>';
            echo '<p class="project-fecha-inicio-real">Inicio Real: ' . $row["fecha_inicio_real"] . '</p>';
            echo '<p class="project-fecha-fin-ideal">Fin Ideal: ' . $row["fecha_fin_ideal"] . '</p>';
            echo '<p class="project-fecha-fin-real">Fin Real: ' . $row["fecha_fin_real"] . '</p>';
            echo '</div>';
        }
        
    } else {
        echo "No se encontraron proyectos con la ID proporcionada.";
    }
} else {
    echo "ID de proyecto no proporcionada en la URL.";
}

$conexion->close();
?>