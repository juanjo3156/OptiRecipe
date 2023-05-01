<?php 
if(!isset($_SESSION['user'])){
    header("Location:".RUTA."login.php");
}
?>