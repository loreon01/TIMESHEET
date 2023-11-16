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
    $proyectoID = isset($_GET['id']) ? $_GET['id'] : null;
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cutive&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="proyectostyle.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Proyecto</title>
</head>
<body>
<ul class="navbar">
        <li class="navitem"><a href="../Menu/menu.php?id=<?php echo $usuario_id; ?>">Timesheet</a></li>
        <li class="navitem"><a href="../Menu/menu.php?id=<?php echo $usuario_id; ?>">Inicio</a></li>
        <li class="navitem"><a href="../AgregarProyecto/agregarproyecto.php">Agregar Proyecto</a></li>
        <li class="navitem"><a href="../php/cerrar_sesion.php">Cerrar Sesion</a></li>
        <li class="navitem"><a href="../php/eliminar_proyecto.php?id=<?php echo $proyectoID; ?>">Eliminar Proyecto</a></li>
    </ul>
    <br>
    <div class="info-princ">
    <?php
        
        include '../php/detalle_proyecto.php';
    ?>
    </div>

    <div class="container">
        <div class="archivos" id="archivos">
            <button id="subir-archivo">Subir archivo</button>
                 <?php
        
                    include '../php/mostrar_archivos.php';
                  ?>
            </div>
        
        <div class="empleados">
            <button id="subir-empleado">Añadir empleado</button>
            <?php
        
                    include '../php/mostrar_empleado.php';
                  ?>

        </div>
    </div>
    <div id="miPopUp" class="popup">
    <div class="popup-contenido">
      <span class="cerrar" id="cerrarPopUp">&times;</span>
      <h2>Subir Archivo</h2>

        <div id="contenedor" class="link">
        <form action="../php/subir_archivos.php" method="post">
        <label for="nombre">Nombre del archivo:</label>
        <input type="text" id="nombre_archivo" name="nombre_archivo" required><br><br>
        <br>
        <label for="link">Enlace:</label>
        <input type="text" id="link" name="link" required><br><br>
        <br>
        <input type="hidden" name="id" id="id" value="">
        
        <button id="btnarchivo" type="submit">Subir Archivo</button>
        </form>
        </div>
    </div>
  </div>

  <div id="miPopUp2" class="popup2">
    <div class="popup2-contenido">
      <span class="cerrar2" id="cerrarPopUp2">&times;</span>
      <h2>Añadir Empleado</h2>

        <div id="contenedor" class="link">
        <input type="text" id="searchInput" onkeyup="searchNames()" placeholder="Buscar nombres">
        <div id="searchResults"></div>
        <input type="hidden" name="id" id="id" value="">
        

        </div>
    </div>
  </div>
    
 
  <script>
    $(document).ready(function() {
    $(".eliminar").click(function() {
        var enlaceID = $(this).data("enlaceid");

        // Guarda una referencia al botón actual para utilizarla dentro de la función success
        var botonEliminar = $(this);

        // Envía una solicitud al servidor para eliminar los datos
        $.ajax({
            type: "POST",
            url: "../php/eliminar_archivo.php", // Archivo PHP para eliminar el enlace
            data: { enlace_id: enlaceID },
            success: function(response) {
                // Actualiza la interfaz del usuario si es necesario
                if (response === "success") {
                    // Puedes ocultar o eliminar el div correspondiente
                    botonEliminar.closest(".nombre_archivos").remove();

                    // Refresca la página
                    location.reload();
                } else {
                    alert("Error al eliminar el enlace");
                }
            }
        });
    });
});
</script>
<script>
$(document).ready(function() {
    $(".eliminar-empleado").click(function() {
        var empleadoID = $(this).data("empleadoid");

        // Guarda una referencia al botón actual para utilizarla dentro de la función success
        var botonEliminar = $(this);

        // Envía una solicitud al servidor para eliminar los datos
        $.ajax({
            type: "POST",
            url: "../php/eliminar_empleado.php", // Archivo PHP para eliminar el empleado
            data: { empleado_id: empleadoID },
            success: function(response) {
                // Actualiza la interfaz del usuario si es necesario
                if (response === "success") {
                    // Puedes ocultar o eliminar el div correspondiente
                    botonEliminar.closest(".nombre_empleado").remove();

                    // Refresca la página
                    location.reload();
                } else {
                    alert("Error al eliminar el empleado");
                }
            }
        });
    });
});
</script>
<script>
$(document).ready(function(){
    // Cuando se hace clic en el botón "subir-empleado"
    $("#subir-empleado").click(function(){
        // Muestra el popup
        $("#miPopUp2").show();
    });

    // Cuando se hace clic en el botón de cerrar del popup
    $("#cerrarPopUp2").click(function(){
        // Oculta el popup
        $("#miPopUp2").hide();
    });
});
</script>
<script>
        function searchNames() {
            var input = document.getElementById("searchInput").value;
            if (input === "") {
                document.getElementById("searchResults").innerHTML = "";
                return;
            }

            // Realiza una solicitud al servidor para buscar nombres
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById("searchResults").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "../php/buscador.php?q=" + input, true);
            xhr.send();
        }

        // jQuery para el código relacionado con el popup
        $(document).ready(function(){
            $("#subir-empleado").click(function(){
                $("#miPopUp2").show();
            });

            $("#cerrarPopUp2").click(function(){
                $("#miPopUp2").hide();
            });
        });
    </script>
<script src="script.js"></script>
</body>
</html>