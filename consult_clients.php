<?php 
    require('config/config.php');
    require('scripts/db.php');
    $statement = $connection->prepare("SELECT * FROM patients");
    $statement->execute();
    $patients=$statement->fetchAll();
    
    require('views/consult_clients.view.php'); ?>