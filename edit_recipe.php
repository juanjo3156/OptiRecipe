<?php
    session_start();
    require("config/config.php");
    require("scripts/set_session.php");
    require("scripts/db.php");
    $error = "";
    if(isset($_GET['patient_id']) && isset($_GET["recipe_id"])){
        $patient_id = $_GET["patient_id"];
        $recipe_id = $_GET["recipe_id"];
        $_SESSION["patient_id"] = $patient_id;
        $_SESSION["recipe_id"] = $recipe_id;
        
    }else if(isset($_SESSION["patient_id"]) && isset($_SESSION["recipe_id"])){
        $patient_id = $_SESSION["patient_id"];
        $recipe_id = $_SESSION["recipe_id"];
    }
    if(!empty($patient_id) && !empty($recipe_id)){
        $statement = $connection->prepare("SELECT * FROM prescriptions WHERE prescription_id = :recipe_id LIMIT 1");
        $statement->bindParam(":recipe_id", $recipe_id);
        $statement->execute();
        $recipe_info = $statement->fetch();
        
        $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
        $statement->bindParam(":patient_id", $patient_id);
        $statement->execute();
        $patient_info = $statement->fetch();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST)){
            $date = $_POST["date"];
            $glass_type = $_POST["glass_type"];
            $age = $_POST['age'];
            $sphere_right = $_POST["sphere_right"];
            $sphere_left = $_POST["sphere_left"];
            $cylinder_right = $_POST["cylinder_right"];
            $cylinder_left = $_POST["cylinder_left"];
            $axis_right = $_POST["axis_right"];
            $axis_left = $_POST["axis_left"];
            $height_right = $_POST["height_right"];
            $height_left = $_POST["height_left"];
            $addition_right = $_POST["addition_right"];
            $addition_left = $_POST["addition_left"];
            $dnp_right = $_POST["dnp_right"];
            $dnp_left = $_POST["dnp_left"];
            $notes = $_POST["notes"];
            $price = $_POST["price"];
            $product_description = $_POST['product_description'];
            if(empty($date)||empty($price)){
                $error.= "<li>El nombre, la fecha de nacimiento y el numero de teléfono son obligatorios</li>";
            }if($age > 200 || $age < 1){
                $error.= "<li>Un humano no puede tener más de 200 años o menos de 1</li>";
            }else{
                $statement = $connection->prepare("UPDATE prescriptions SET date=:date, age =:age, glass_type=:glass_type,sphere_right = :sphere_right,sphere_left = :sphere_left,cylinder_right =:cylinder_right,cylinder_left = :cylinder_left,axis_right = :axis_right, axis_left = :axis_left, height_right = :height_right,height_left = :height_left,addition_right=:addition_right,addition_left = :addition_left,dnp_right = :dnp_right,dnp_left = :dnp_left, notes = :notes, price = :price ,product_description=:product_description WHERE patient_id = :patient_id AND prescription_id = :prescription_id");
                $statement->bindParam(":patient_id",$patient_id);
                $statement->bindParam(":prescription_id",$recipe_id);
                $statement->bindParam(':date', $date);
                $statement->bindParam(':age', $age);
                $statement->bindParam(':product_description', $product_description);
                $statement->bindParam(':glass_type', $glass_type);
                $statement->bindParam(':sphere_left', $sphere_left);
                $statement->bindParam(':sphere_right', $sphere_right);
                $statement->bindParam(':cylinder_left', $cylinder_left);
                $statement->bindParam(':cylinder_right', $cylinder_right);
                $statement->bindParam(':axis_left', $axis_left);
                $statement->bindParam(':axis_right', $axis_right);
                $statement->bindParam(':addition_left', $addition_left);
                $statement->bindParam(':addition_right', $addition_right);
                $statement->bindParam(':dnp_left', $dnp_left);
                $statement->bindParam(':dnp_right', $dnp_right);
                $statement->bindParam(':height_left', $height_left);
                $statement->bindParam(':height_right', $height_right);
                $statement->bindParam(':notes', $notes);
                $statement->bindParam(':price', $price);

                $statement->execute();
                $mensaje = "Receta actualizada con éxito";
                header("Location:".RUTA."consult_recipe.php?txtID=".$patient_id."&msg=".$mensaje);
            }
        }
    }
    
    require("views/edit_recipe.view.php"); ?>