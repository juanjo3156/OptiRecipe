<?php 
 require('config/config.php');
 require('scripts/db.php');
    $stm = $connection->prepare( "UPDATE optics_configuration SET enterprise_name='Opti Recipe', address='No definido', phone_number='No definido'");
    $stm->execute();

    // Redirigir a la página principal o a donde sea necesario
    header('Location:'.RUTA."optic_configurations.php");
    exit();

?>