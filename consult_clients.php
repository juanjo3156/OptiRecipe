<?php 
    session_start();
    require('config/config.php');
    require('scripts/db.php');

    if(isset($_GET['search'])){
        $searchQuery = $_GET['search'];
        $statement = $connection->prepare("SELECT * FROM patients WHERE name LIKE :searchQuery");
        $searchParam = '%' . $searchQuery . '%';
        $statement->bindParam(":searchQuery",$searchParam);
        $statement->execute();
        $patients = $statement->fetchAll(PDO::FETCH_ASSOC);
    }else{
        $statement = $connection->prepare("SELECT * FROM patients");
        $statement->execute();
        $patients=$statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // var_dump($patients);


    require('views/consult_clients.view.php'); 
    
    
    ?>