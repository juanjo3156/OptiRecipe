<?php 
    require('config/config.php');
    require('scripts/db.php');
    $statement = $connection->prepare("SELECT * FROM patients");
    $statement->execute();

    $patients=$statement->fetchAll();
    // var_dump($patients);


    // Delete section
    if(isset($_GET['txtID'])){
        $id = $_GET['txtID'];
        $statement = $connection->prepare("DELETE FROM patients WHERE patient_id = :id");
        $statement->bindParam(":id",$id);
        $statement->execute();
        header("Location:".RUTA."consult_clients.php");
    }
    require('views/consult_clients.view.php'); 
    
    
    ?>