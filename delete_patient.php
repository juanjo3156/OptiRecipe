<?php 
require('scripts/db.php');
require('config/config.php');

if(isset($_GET['delete_id'])){
    $id = $_GET['delete_id'];
    $statement = $connection->prepare("DELETE FROM patients WHERE patient_id = :id");
    $statement->bindParam(":id",$id);
    $statement->execute();
    $mensaje = "Paciente eliminado";
    header("Location:".RUTA."consult_clients.php?msg=".$mensaje);
}
require('views/consult_clients.view.php'); 
?>