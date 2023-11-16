<?php
session_start();

// Verifica si el usuario ha iniciado sesión y tiene una ID específica
if (isset($_SESSION['usuario_id'])) {
    $idFromSession = $_SESSION['usuario_id'];
} else {
    // Si el usuario no ha iniciado sesión o no tiene una ID específica, puedes asignar un valor predeterminado o redirigirlo a una página de inicio de sesión.
    $idFromSession = 0; // Por ejemplo, aquí asignamos 0 como valor predeterminado.
    // O redirige al usuario a la página de inicio de sesión
    header("Location: ../Login/login.php");
    exit;
}
?>