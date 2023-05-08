<?php 
    session_start();
    require("config/config.php");
    require("scripts/set_session.php");
    require('scripts/db.php');
    $error = "";

    if (isset($_SESSION['txtID'])) {
        $txtID = $_SESSION['txtID'];
        $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
        $statement->bindParam(":patient_id", $txtID);
        $statement->execute();
        $patient_info = $statement->fetch();
    }
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST)) {
                $txtID = $_SESSION["txtID"];
                if (isset($_POST['patient_id'])) {
                    $patient_id = $_SESSION["txtID"];
                    $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
                    $statement->bindParam(":patient_id", $patient_id);
                    $statement->execute();
                    $patient = $statement->fetch(PDO::FETCH_ASSOC);

                    if($patient){
                    $date = $_POST['date'];
                    $glass_type = $_POST['glass_type'];
                    $sphereLeft = $_POST['sphere_left'];
                    $sphereRight = $_POST['sphere_right'];
                    $cylinderLeft = $_POST['cylinder_left'];
                    $cylinderRight = $_POST['cylinder_right'];
                    $axisLeft = $_POST['axis_left'];
                    $axisRight = $_POST['axis_right'];
                    $additionLeft = $_POST['addition_left'];
                    $additionRight = $_POST['addition_right'];
                    $dnpLeft = $_POST['dnp_left'];
                    $dnpRight = $_POST['dnp_right'];
                    $heightLeft = $_POST['height_left'];
                    $heightRight = $_POST['height_right'];
                    $notes = $_POST['notes'];
                    $price = $_POST['price'];
        
                    if (empty($price) || empty($date) || $glass_type == "") {
                        $error .= "<li>El precio y la fecha de creación son obligatorios</li>";
                    } else {
                        $sqlFolio = "SELECT LPAD(COUNT(*) + 1, 4, '0') AS folio FROM prescriptions";
                        $stmtFolio = $connection->prepare($sqlFolio);
                        $stmtFolio->execute();
                        $folioRow = $stmtFolio->fetch(PDO::FETCH_ASSOC);
                        $folio = 'RE' . $folioRow['folio'];

                        $sqlInsert = "INSERT INTO prescriptions (patient_id, folio, date,glass_type, sphere_left, sphere_right, cylinder_left, cylinder_right, axis_left, axis_right, addition_left, addition_right, dnp_left, dnp_right, height_left, height_right, notes, price)
                        VALUES (:patient_id, :folio, :date,:glass_type, :sphere_left, :sphere_right, :cylinder_left, :cylinder_right, :axis_left, :axis_right, :addition_left, :addition_right, :dnp_left, :dnp_right, :height_left, :height_right, :notes, :price)";
                        
                        
                        $stmt = $connection->prepare($sqlInsert);
                        $stmt->bindParam(':patient_id', $patient_id);
                        $stmt->bindParam(':folio', $folio);
                        $stmt->bindParam(':date', $date);
                        $stmt->bindParam(':glass_type', $glass_type);
                        $stmt->bindParam(':sphere_left', $sphereLeft);
                        $stmt->bindParam(':sphere_right', $sphereRight);
                        $stmt->bindParam(':cylinder_left', $cylinderLeft);
                        $stmt->bindParam(':cylinder_right', $cylinderRight);
                        $stmt->bindParam(':axis_left', $axisLeft);
                        $stmt->bindParam(':axis_right', $axisRight);
                        $stmt->bindParam(':addition_left', $additionLeft);
                        $stmt->bindParam(':addition_right', $additionRight);
                        $stmt->bindParam(':dnp_left', $dnpLeft);
                        $stmt->bindParam(':dnp_right', $dnpRight);
                        $stmt->bindParam(':height_left', $heightLeft);
                        $stmt->bindParam(':height_right', $heightRight);
                        $stmt->bindParam(':notes', $notes);
                        $stmt->bindParam(':price', $price);

                        try {
                            $stmt->execute();
                            header("Location:".RUTA."consult_recipe.php?txtID=".$txtID);
                            $connection = null;
                            exit;
                        } catch (PDOException $e) {
                            
                        }

                        // Cerrar la conexión a la base de datos
                     
                        }
                    }else{
                        $error.="El paciente no existe en la base de datos";
                    }
                        }
                    }
                
            }
        

                
    
   

    require("views/new_recipe.view.php");
?>