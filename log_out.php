<?php 
    require('config/config.php');
    session_start();
    session_destroy();
    header('Location:'.RUTA.'login.php');

?>