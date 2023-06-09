<?php 
    session_start();
    require('config/config.php');
    require('scripts/db.php');

    if(isset($_GET['txtID'])){
        $_SESSION['txtID'] = $_GET['txtID'];
        $txtID = $_SESSION['txtID'];
        $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
        $statement->bindParam(":patient_id",$txtID);
        $statement->execute();
        $patient_info = $statement->fetch();

        $statement = $connection->prepare("SELECT * FROM prescriptions WHERE patient_id = :patient_id ORDER BY date DESC, prescription_id DESC");
        $statement->bindParam(":patient_id",$txtID);
        $statement->execute();
        $recipes = $statement->fetchAll();
        
    }

    
    require('views/consult_recipe.view.php');
?>