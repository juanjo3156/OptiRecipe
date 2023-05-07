<?php 
session_start();

    require("config/config.php");
    require("scripts/set_session.php");
    require("scripts/db.php");
    $error = "";
    if(isset($_GET['txtID'])){
        $patient_id = $_GET['txtID'];
        $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
        $statement->bindParam(":patient_id",$patient_id);
        $statement->execute();
        $patient_info = $statement->fetch();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST)){
            $patient_id = $_POST['patient_id'];
            $name = $_POST['name'];     
            $date_of_birth = $_POST['date_of_birth'];     
            $address = $_POST['address'];     
            $phone = $_POST['phone'];     
            $email = $_POST['email'];
            
            if(empty($name)||empty($date_of_birth)||empty($phone)){
                $error.= "<li>El nombre, la fecha de nacimiento y el numero de teléfono son obligatorios</li>";
            }else{
                $statement = $connection->prepare("UPDATE patients SET name=:name,date_of_birth =:date_of_birth,email=:email,phone=:phone,address = :address WHERE patient_id = :patient_id");
                $statement->bindParam(":patient_id",$patient_id);
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

    require("views/edit_patient.view.php");
?>