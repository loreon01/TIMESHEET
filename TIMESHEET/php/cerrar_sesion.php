<?php
    session_start();
    
        header("location: ../Login/login.php");
        session_destroy();
    
?>