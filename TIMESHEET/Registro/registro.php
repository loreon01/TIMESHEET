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
        <link rel="stylesheet" href="estiloregistro.css">
        <title>Registro</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="iconweb.png" />
    </head>
<body>
    <ul class="navbar">
        <li class="navitem"><a>Timesheet</a></li>
        <span class="material-symbols-outlined">
            alarm
            </span>
        
    </ul>
<h2>Bienvenido, por favor, registrarse completando sus datos.</h2>
<br>

    <div id="contenedor">
    <form id="form" action="../php/procesar_registro.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <br>
        <input type="text" id="usuario" name="usuario" required>
        <br><br>

        <label for="contrasena">Contraseña:</label>
        <br>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>

        <label for="nombre">Nombre:</label>
        <br>
        <input type="text" id="nombre" name="nombre" required>
        <br><br>

        <label for="apellido">Apellido:</label>
        <br>
        <input type="text" id="apellido" name="apellido" required>
        <br><br>

        <label for="tipo_usuario">Tipo de usuario:</label>
        <br>
        <select id="tipo_usuario" name="tipo_usuario">
            <option value="usuario">Usuario</option>
            <option value="administrador">Administrador</option>
        </select>
        <br><br>
</div>
        <button id="btnregistro" type="submit">Registrarme</button>
    </form>
    <footer>
        <button onclick="window.location.href = '../Login/login.php';">Volver</button>
    </footer>

</body>
</html>