<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$tipo = $_POST['tipo_usuario'];
$rol = $_POST['rol'];


$query = "INSERT INTO `usuarios`(`usuario`, `contra`, `tipo`) VALUES ('$usuario', '$contrasena', '$tipo')";
$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {

    $usuario_id = mysqli_insert_id($conexion);


    $query2 = "INSERT INTO `empleado`(`nombre`, `apellido`, `rol`) VALUES ('$nombre', '$apellido', '$rol')";
    $ejecutar2 = mysqli_query($conexion, $query2);

    if ($ejecutar2) {

        $empleado_id = mysqli_insert_id($conexion);


        $query3 = "INSERT INTO `rel_user_empleado`(`usuario_id`, `empleado_id`) VALUES ('$usuario_id', '$empleado_id')";
        $ejecutar3 = mysqli_query($conexion, $query3);

        if ($ejecutar3) {
            echo '
            <script>
                alert("Usuario creado con éxito!")
                window.location= "../Login/login.php"
            </script>
            ';
        } else {
            echo "Error al insertar datos en la tabla intermedia.";
        }
    } else {
        echo "Error al insertar datos en la tabla 'empleado'.";
    }
} else {
    echo "Error al insertar datos en la tabla 'usuarios'.";
}

mysqli_close($conexion);
?>