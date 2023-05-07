<?php 
    session_start();
    require('config/config.php');
    require('scripts/db.php');
    $statement = $connection->prepare("SELECT * FROM patients");
    $statement->execute();

    $patients=$statement->fetchAll();
    // var_dump($patients);


    require('views/consult_clients.view.php'); 
    
    
    ?>