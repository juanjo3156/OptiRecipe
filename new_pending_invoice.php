<?php
session_start();
$error = "";
require("config/config.php");
require("scripts/db.php");
require("scripts/functions.php");
require("scripts/set_session.php");

if (isset($_GET['patient_id'])) {
  $patientId = $_GET['patient_id'];

  // Consulta las recetas asociadas al paciente seleccionado
  $statement = $connection->prepare("SELECT prescription_id, folio FROM prescriptions WHERE patient_id = :patient_id ORDER BY date DESC");
  $statement->bindParam(":patient_id", $patientId);
  $statement->execute();
  $recipes = $statement->fetchAll(PDO::FETCH_ASSOC);

  // Devuelve las recetas en formato JSON
  header('Content-Type: application/json');
  echo json_encode($recipes);
  exit();
}

$statement = $connection->prepare("SELECT * FROM patients ORDER BY name ASC");
$statement->execute();
$patients = $statement->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST["recipe_id"]) && isset($_POST["card_type"])) {
    $recipe_id = $_POST["recipe_id"];
    $card_type = $_POST["card_type"];
    $rfc = strtoupper($_POST["rfc"]);
    $in_name = $_POST["in_name"];
    $invoice_use = $_POST["invoice_use"];

    $statement = $connection->prepare("SELECT folio, price FROM prescriptions WHERE prescription_id = :recipe_id");
    $statement->bindParam(":recipe_id", $recipe_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if($result){
        $folio = $result['folio'];
        $amount = $result['price'];

        $statement = $connection->prepare("INSERT INTO pending_invoices (prescription_folio, card_type,amount,invoice_use,rfc,in_name) VALUES (:prescription_folio, :card_type,:amount,:invoice_use,:rfc,:in_name)");
        $statement->bindParam(":prescription_folio", $folio);
        $statement->bindParam(":card_type", $card_type);
        $statement->bindParam(":amount", $amount);
        $statement->bindParam(":rfc", $rfc);
        $statement->bindParam(":in_name", $in_name);
        $statement->bindParam(":invoice_use", $invoice_use);
        $statement->execute();
        $mensaje = "Factura pendiente agregada";
        header("Location:".RUTA."pending_invoices.php?msg=".$mensaje);
    }    
  }else{
    $error.= "<li>La receta asociada y el tipo de tarjeta son obligatorios</li>";
  }
}

require("views/new_pending_invoice.view.php");
?>
