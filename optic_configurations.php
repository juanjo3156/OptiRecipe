<?php 
    session_start();
    require('config/config.php');
    require('scripts/db.php');
   

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los nuevos datos del formulario
        $newName = $_POST['enterprise_name'];
        $newAddress = $_POST['address'];
        $newPhone = $_POST['phone_number'];
      
        // Actualizar los datos en la base de datos
        $statement = $connection->prepare( "UPDATE optics_configuration SET enterprise_name='$newName', address='$newAddress', phone_number='$newPhone'");
        $statement->execute();
        header("Location:".RUTA);
      }
      $statement = $connection->prepare("SELECT * FROM optics_configuration LIMIT 1");
      $statement->execute();
      $result = $statement->fetch();
      
    require("views/optic_configurations.view.php"); ?>