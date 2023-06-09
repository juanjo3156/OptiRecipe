<?php 
session_start();

    require("config/config.php");
    require("scripts/set_session.php");
require("scripts/functions.php");

    require("scripts/db.php");
    $error = "";
    $txtID = ""; // Variable para almacenar el valor de txtID

    if (isset($_GET['txtID'])) {
        $txtID = $_GET['txtID'];
        $_SESSION["txtID"] = $txtID;
    } elseif (isset($_SESSION['txtID'])) {
        $txtID = $_SESSION['txtID'];
    }

    if (!empty($txtID)) {
        $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
        $statement->bindParam(":patient_id", $txtID);
        $statement->execute();
        $patient_info = $statement->fetch();
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if(isset($_POST)){
            $name = clean_data($_POST['name']);     
            $date_of_birth = $_POST['date_of_birth'];     
            $address = clean_data($_POST['address']);     
            $phone = clean_data($_POST['phone']);     
            $email = clean_data(strtolower( $_POST['email']));
            
            if(empty($name)){
                $error.= "<li>El nombre del paciente es obligatorio</li>";
            }else{
                $statement = $connection->prepare("UPDATE patients SET name=:name,date_of_birth =:date_of_birth,email=:email,phone=:phone,address = :address WHERE patient_id = :patient_id");
                $statement->bindParam(":patient_id",$txtID);
                $statement->bindParam(":name",$name);
                $statement->bindParam(":email",$email);
                $statement->bindParam(":phone",$phone);
                $statement->bindParam(":address",$address);
                $statement->bindParam(":date_of_birth",$date_of_birth);
    
                $statement->execute();
                $mensaje = "Paciente actualizado con éxito";
                header("Location:".RUTA."consult_clients.php?msg=".$mensaje);
    
            }
        
        }
    }

    require("views/edit_patient.view.php");
?>