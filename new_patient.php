<?php
require("config/config.php");
require("scripts/db.php");
$error = '';
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST)){
        $name = $_POST['name'];     
        $date_of_birth = $_POST['date_of_birth'];     
        $address = $_POST['address'];     
        $phone = $_POST['phone'];     
        $email = $_POST['email'];

        if(empty($name)||empty($date_of_birth)||empty($phone)){
            $error.= "<li>El nombre, la fecha de nacimiento y el numero de teléfono son obligatorios</li>";
        }else{
            $statement = $connection->prepare("INSERT INTO patients (name,email,phone,address,date_of_birth) VALUES (:name,:email,:phone,:address,:date_of_birth)");
            $statement->bindParam(":name",$name);
            $statement->bindParam(":email",$email);
            $statement->bindParam(":phone",$phone);
            $statement->bindParam(":address",$address);
            $statement->bindParam(":date_of_birth",$date_of_birth);

            $statement->execute();

            header("Location:".RUTA."consult_clients.php");

        }
    
    }
}
require("views/new_patient.view.php") ?>