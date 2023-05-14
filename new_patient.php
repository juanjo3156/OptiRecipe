<?php
session_start();
require("config/config.php");
require("scripts/set_session.php");
require("scripts/functions.php");
require("scripts/db.php");
$error = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST)){
        $name = clean_data($_POST['name']);     
        $date_of_birth = $_POST['date_of_birth'];     
        $address = clean_data($_POST['address']);     
        $phone = clean_data($_POST['phone']);     
        $email = clean_data(strtolower( $_POST['email']));
        
        if(empty($name)|| empty($phone)){
            $error.= "<li>El nombre del paciente es obligatorio</li>";
        }else{
            $statement = $connection->prepare("INSERT INTO patients (name,email,phone,address,date_of_birth) VALUES (:name,:email,:phone,:address,:date_of_birth)");
            $statement->bindParam(":name",$name);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":address",$address);
            $statement->bindParam(":date_of_birth",$date_of_birth);

            $statement->execute();
            $mensaje = "Paciente creado con éxito";
            header("Location:".RUTA."consult_clients.php?msg=".$mensaje);

        }
    
    }
}
require("views/new_patient.view.php") ?>