<?php
    session_start();
    if(!isset($_SESSION['usuario'])){
        echo '
        <script>
            alert("Acceso denegado")
        </script>
        ';
        header("location: ../Login/login.php");
        session_destroy();
        die();
    }
    $usuario_id = $_SESSION['usuario_id'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="proyectostyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Agregar Proyecto</title>
    <link rel="shortcut icon" href="iconweb.png"/>
</head>
<body>


<ul class="navbar">
        <li class="navitem"><a href="../Menu/menu.php?id=<?php echo $usuario_id; ?>">Timesheet</a></li>
        <li class="navitem"><a href="../Menu/menu.php?id=<?php echo $usuario_id; ?>">Inicio</a></li>
        <li class="navitem"><a href="../php/cerrar_sesion.php">Cerrar Sesion</a></li>
    </ul>
    <br>
    <h2>Formulario de Ingreso de Datos del Proyecto</h2> 
    <div id="AP2"> 

      <form action="../php/agregar_proyecto.php" method="post">
        <label for="nombre_proyecto">Nombre del Proyecto:</label>
        <input type="text" id="nombre_proyecto" name="nombre_proyecto" required><br><br>

        <label for="project_manager">Project Manager:</label>
        <input type="text" id="project_manager" name="project_manager" required><br><br>

        <label for="tipo">Tipo:</label>
        <input type="text" id="tipo" name="tipo" required><br><br>

        <label for="responsable_comercial">Responsable Comercial:</label>
        <input type="text" id="responsable_comercial" name="responsable_comercial" required><br><br>

        <label for="responsable_gestion">Responsable de Gestión:</label>
        <input type="text" id="responsable_gestion" name="responsable_gestion" required><br><br>
    
        <label for="fecha_inicio_real">Fecha de Inicio Real:</label>
        <input type="date" id="fecha_inicio_real" name="fecha_inicio_real" required><br><br>

        <label for="fecha_inicio_ideal">Fecha de Inicio Ideal:</label>
        <input type="date" id="fecha_inicio_ideal" name="fecha_inicio_ideal" required><br><br>

        <label for="fecha_fin_ideal">Fecha de Fin Ideal:</label>
        <input type="date" id="fecha_fin_ideal" name="fecha_fin_ideal" required><br><br>

        <label for="fecha_fin_real">Fecha de Fin Real:</label>
        <input type="date" id="fecha_fin_real" name="fecha_fin_real" required><br><br>

        <input id="boton" type="submit" value="Guardar Datos del Proyecto">
        </form>
       <a class="enlace-volver" href="../Menu/menu.php?id=<?php echo $usuario_id; ?>">Volver</a>
       <br>
    </div>

</body>
</html>