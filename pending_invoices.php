<?php 
    session_start();
    require("config/config.php");
    require("scripts/db.php");
    require("scripts/functions.php");
    require("scripts/set_session.php");

    $statement = $connection->prepare("SELECT pending_invoices.invoice_id,pending_invoices.prescription_folio, pending_invoices.amount, pending_invoices.card_type,pending_invoices.invoice_use,pending_invoices.rfc,pending_invoices.in_name, patients.name
                                  FROM pending_invoices
                                  JOIN prescriptions ON pending_invoices.prescription_folio = prescriptions.folio
                                  JOIN patients ON prescriptions.patient_id = patients.patient_id ORDER BY prescriptions.folio DESC");
    $statement->execute();
    $pending_invoices = $statement->fetchAll(PDO::FETCH_ASSOC);


    require("views/pending_invoices.view.php");

?>