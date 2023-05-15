<?php 
require('scripts/db.php');
require('config/config.php');

if(isset($_GET['delete_id'])){
    $invoice_id = $_GET['delete_id'];
    $statement = $connection->prepare("DELETE FROM pending_invoices WHERE invoice_id= :invoice_id");
    $statement->bindParam(":invoice_id",$invoice_id);
    $statement->execute();
    $mensaje = "Factura pendiente eliminada";
    header("Location:".RUTA."pending_invoices.php?msg=".$mensaje);
}
require('views/consult_clients.view.php'); 
?>