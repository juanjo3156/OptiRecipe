<?php 
require('scripts/db.php');
require('config/config.php');

if(isset($_GET['patient_id']) && isset($_GET['recipe_id'])){
    $patient_id = $_GET['patient_id'];
    $recipe_id = $_GET['recipe_id'];
    $statement = $connection->prepare("DELETE FROM prescriptions WHERE prescription_id = :recipe_id AND patient_id = :patient_id");
    $statement->bindParam(":patient_id",$patient_id);
    $statement->bindParam(":recipe_id",$recipe_id);
    $statement->execute();
    header("Location:".RUTA."consult_recipe.php?txtID=".$patient_id);
}
require('views/consult_clients.view.php'); 
?>