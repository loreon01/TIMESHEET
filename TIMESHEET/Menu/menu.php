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
    <link rel="stylesheet" href="menustyle.css">
    <script src="script.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cutive&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Timesheet</title>
</head>
<body>
<ul class="navbar">
        <li class="navitem"><a href="menu.php?id=<?php echo $usuario_id; ?>">Timesheet</a></li>
        <li class="navitem"><a href="menu.php?id=<?php echo $usuario_id; ?>">Inicio</a></li>
        <li class="navitem"><a href="../AgregarProyecto/agregarproyecto.php">Agregar Proyecto</a></li>
        <li class="navitem"><a href="../php/cerrar_sesion.php">Cerrar Sesion</a></li>
    </ul>
    <h2>Mis proyectos</h2>
    <br>
    <div id="proyectos-container">

    </div>


    <script>
    
    var proyectosContainer = document.getElementById('proyectos-container');
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            proyectosContainer.innerHTML = xhr.responseText;

            
            proyectosContainer.addEventListener('click', function(event) {
                var target = event.target;
                if (target.classList.contains('proyecto-cuadro')) {
                    
                    var proyectoID = target.getAttribute('data-proyecto-id');
                    
                    window.location.href = '../Proyecto/proyecto.php';
                }
            });
        }
    };
    var urlParams = new URLSearchParams(window.location.search);
    var idFromURL = urlParams.get("id");
    xhr.open('GET', '../php/componente_proyecto.php?id=' + idFromURL, true); 
    xhr.send();

</script>

  
</body>
</html>