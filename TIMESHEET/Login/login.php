<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        header("location: ../Menu/menu.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cutive&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="loginstyle.css">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="iconweb.png" />

</head>

<body>
    
    <div class="container">
        <ul class="navbar">
            <li class="navitem"><a>Timesheet</a></li>
            <span class="material-symbols-outlined">
                alarm
                </span>
            
        </ul>
    
        <div id="iniciar">
            <h2>Iniciar sesión</h2>
          <form action="../php/procesar_login.php" method="post">
            <label for="usuario">Nombre de usuario:</label><br>
            <input type="text" id="usuario" name="usuario" required><br><br>
            
            <label for="contrasena">Contraseña:</label><br>
            <input type="password" id="contrasena" name="contrasena" required><br><br>

            <input class="cono" type="submit" value="Entrar">
            <p>¿No tienes una cuenta? <a href="../Registro/registro.php">Crear una cuenta</p>
        </div>

    </div>
    
    
    <script src="script.js"></script>
</body>
</html>