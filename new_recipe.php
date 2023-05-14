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
                if (isset($_POST['patient_id'])) {
                    $patient_id = $_SESSION["txtID"];
                    $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
                    $statement->bindParam(":patient_id", $patient_id);
                    $statement->execute();
                    $patient = $statement->fetch(PDO::FETCH_ASSOC);

                    if($patient){
                    $date = $_POST['date'];
                    $glass_type = $_POST['glass_type'];
                    $age = $_POST['age'];
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
                    $product_description = $_POST['product_description'];
                    $price = $_POST['price'];
                    
                    if (empty($price) || empty($date) || $glass_type == "") {
                        $error .= "<li>El precio y la fecha de creación son obligatorios</li>";
                    }
                    if($age > 200 || $age < 1){
                        $error.= "<li>Un humano no puede tener más de 200 años o menos de 1</li>";
                    } else {
                        $sqlCounter = "SELECT current_value FROM recipe_counter LIMIT 1";
                            $stmtCounter = $connection->prepare($sqlCounter);
                            $stmtCounter->execute();
                            $counterRow = $stmtCounter->fetch(PDO::FETCH_ASSOC);

                            if ($counterRow) {
                                $counterValue = $counterRow['current_value'] + 1;
                            } else {
                                $counterValue = 1;

                                $sqlInsertCounter = "INSERT INTO recipe_counter (current_value) VALUES (:current_value)";
                                $stmtInsertCounter = $connection->prepare($sqlInsertCounter);
                                $stmtInsertCounter->bindParam(':current_value', $counterValue);
                                $stmtInsertCounter->execute();
                            }

                            $folio = 'RE' . str_pad($counterValue, 4, '0', STR_PAD_LEFT);

                            // Incrementar el valor del contador en 1
                            $sqlUpdateCounter = "UPDATE recipe_counter SET current_value = :new_value";
                            $stmtUpdateCounter = $connection->prepare($sqlUpdateCounter);
                            $stmtUpdateCounter->bindParam(':new_value', $counterValue);
                            $stmtUpdateCounter->execute();

                        // Generar el folio utilizando el valor del contador
                            $folio = 'RE' . str_pad($counterValue, 4, '0', STR_PAD_LEFT);

                            // Incrementar el valor del contador en 1
                            $newCounterValue = $counterValue + 1;
                            $sqlUpdateCounter = "UPDATE recipe_counter SET current_value = :new_value WHERE counter_id = 1";
                            $stmtUpdateCounter = $connection->prepare($sqlUpdateCounter);
                            $stmtUpdateCounter->bindParam(':new_value', $newCounterValue);
                            $stmtUpdateCounter->execute();

                            $sqlInsert = "INSERT INTO prescriptions (patient_id,folio,date,age,glass_type, sphere_left, sphere_right, cylinder_left, cylinder_right, axis_left, axis_right, addition_left, addition_right, dnp_left, dnp_right, height_left, height_right, notes,product_description,price)
                            VALUES (:patient_id,:folio,:date,:age,:glass_type, :sphere_left, :sphere_right, :cylinder_left, :cylinder_right, :axis_left, :axis_right, :addition_left, :addition_right, :dnp_left, :dnp_right, :height_left, :height_right, :notes,:product_description, :price)";
                            
                            
                            $stmt = $connection->prepare($sqlInsert);
                            $stmt->bindParam(':patient_id', $patient_id);
                            $stmt->bindParam(':date', $date);
                            $stmt->bindParam(':age', $age);
                            $stmt->bindParam(':product_description', $product_description);
                            $stmt->bindParam(':folio', $folio);
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
                                $mensaje = "Receta creada con exito";
                                header("Location:".RUTA."consult_recipe.php?txtID=".$txtID."&msg=".$mensaje);
                                $connection = null;
                                exit;
                            } catch (PDOException $e) {
                                echo $e->getMessage();
                            }

                            // Cerrar la conexión a la base de datos
                        
                            }}
                        }else{
                            $error.="El paciente no existe en la base de datos";
                        }
                
            }
                    
        }
            

                
    
   

    require("views/new_recipe.view.php");
?>