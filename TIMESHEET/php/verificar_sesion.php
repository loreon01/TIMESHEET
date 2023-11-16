<?php
session_start();


if (isset($_SESSION['usuario_id'])) {
    $idFromSession = $_SESSION['usuario_id'];
} else {
    
    $idFromSession = 0; 
    header("Location: ../Login/login.php");
    exit;
}
?>