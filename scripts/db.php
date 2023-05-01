<?php 
    $server = "localhost";
    $database = "opti_recipe";
    $user = "root";
    $pass = "";
    
    try{
        $connection = new PDO("mysql:host=$server;dbname=$database",$user,$pass);
    }catch(Exception $e){
        echo $e ->getMessage();
    }