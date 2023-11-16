<?php
session_start();
include 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contra='$contrasena'";
$result = $conexion->query($sql);

if (mysqli_num_rows($result) > 0) {

    $row = $result->fetch_assoc();
    $usuario_id = $row['usuario_id'];

    $_SESSION['usuario'] = $usuario;
    $_SESSION['usuario_id'] = $usuario_id;

    header("Location: ../Menu/menu.php?id=" . $usuario_id);
    exit;
} else {
    echo
    '
    <script> 
        alert("Usuario o contraseña incorrecta")
        window.location= "../Login/login.php"
    </script>
    ';
}
?>