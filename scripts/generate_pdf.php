<?php
require("../config/config.php"); 
require("db.php");

if(isset($_GET["patient_id"]) && isset($_GET["recipe_id"])){
    $patient_id = $_GET["patient_id"];
    $recipe_id = $_GET["recipe_id"];


    $statement = $connection->prepare("SELECT * FROM patients WHERE patient_id = :patient_id LIMIT 1");
    $statement->bindParam(":patient_id",$patient_id);
    $statement->execute();
    $patient_info = $statement->fetch();

    $statement = $connection->prepare("SELECT * FROM optics_configuration");
    $statement->execute();
    $enterprise_info = $statement->fetch();

    $statement = $connection->prepare("SELECT * FROM prescriptions WHERE patient_id = :patient_id AND prescription_id = :recipe_id LIMIT 1");
    $statement->bindParam(":patient_id",$patient_id);
    $statement->bindParam(":recipe_id",$recipe_id);
    $statement->execute();
    $recipe_info = $statement->fetch();
}
?>
<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA?>build/css/app.css">
    <script src="https://kit.fontawesome.com/9324a5a112.js" crossorigin="anonymous"></script>
    <script src="http://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Receta <?php echo $enterprise_info["enterprise_name"]?> <?php echo $patient_info["name"]?> <?php echo $recipe_info["folio"]?></title>
</head>
<body class="body-recipe">
    <div class="container recipe">
        <div class="recipe__head">
            <p class="recipe__folio">Folio de la receta: <?php echo $recipe_info["folio"]?></p>
            <?php $prescriptionDate = date('d/m/Y', strtotime($recipe_info['date']));?>
            <p class="recipe__date">Fecha de creación: <?php echo $prescriptionDate?></p>
        </div>
            
        <div class="recipe__header">
            <h2 class="tittle"><?php echo $enterprise_info["enterprise_name"]?></h2>
            <!-- <i class="fa-solid fa-glasses"></i> -->
            
            
        </div>
        <div class="recipe__enterprise-info">
                <p>Optometrista: <?php echo $enterprise_info["optometrist"]?></p>
                <p>Dirección: <?php echo $enterprise_info["address"]?></p>
                <p>Teléfono: <?php echo $enterprise_info["phone_number"]?></p>
            </div>
       
        <div class="recipe__patient-info">
            <p>Paciente: <?php echo $patient_info["name"]?></p>
            <?php $birthDate = date('d/m/Y', strtotime($patient_info['date_of_birth']));?>

            <p>Fecha de nacimiento: <?php echo $birthDate?></p>
            <p>Teléfono: <?php echo $patient_info["phone"]?></p>
            <p>Correo electrónico: <?php echo $patient_info["email"]?></p>
        </div>
        
        <div class="recipe__info">
            <p class="recipe__graduations">Graduaciones: </p>
        <table class="recipe__table">
                <tr>
                    <th></th>
                    <th>Esf</th>
                    <th>Cil</th>
                    <th>Eje</th>
                    <th>Alt</th>
                    <th>Add</th>
                    <th>Dnp</th>
                </tr>
                <tr>
                <th>OD</th>
                    <td><?php echo $recipe_info["sphere_right"]?></td>
                    <td><?php echo $recipe_info["cylinder_right"]?></td>
                    <td><?php echo $recipe_info["axis_right"]?></td>
                    <td><?php echo $recipe_info["height_right"]?></td>
                    <td><?php echo $recipe_info["addition_right"]?></td>
                    <td><?php echo $recipe_info["dnp_right"]?></td>
                </tr>
                <tr>
                <th>OI</th>
                    <td><?php echo $recipe_info["sphere_left"]?></td>
                    <td><?php echo $recipe_info["cylinder_left"]?></td>
                    <td><?php echo $recipe_info["axis_left"]?></td>
                    <td><?php echo $recipe_info["height_left"]?></td>
                    <td><?php echo $recipe_info["addition_left"]?></td>
                    <td><?php echo $recipe_info["dnp_left"]?></td>
                </tr>
            </table>
            
        </div>

        <div class="recipe__notes">
            <div class="recipe__data">
                <div>
                    <h2>Tipo de mica: </h2><p><?php echo $recipe_info["glass_type"]?></p>
                </div>
                <div>
                    <h2>Observaciones:</h2><p><?php echo $recipe_info["notes"]?></p>
                </div>
                
            </div>
            <div class="recipe__price">
                <div class="recipe__price-content">
                    
                    <p>Precio total: <span>$<?php echo $recipe_info["price"]?></span></p>
                </div>

            </div>
            
            
        </div>
        
        <div class="recipe__footer">
            <p class="right-align">Receta optometrica generada por Opti-Recipe</p>
        </div>
    </div>
    
</body>
</html>
<?php $html = ob_get_clean(); 
require_once("../libs/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);

$dompdf -> loadHtml($html);
$dompdf -> setPaper("A4",);
$dompdf -> render();
$filename = "receta:".$recipe_info["folio"]."_paciente: ".$patient_info["name"].".pdf";
$dompdf -> stream($filename,array("Attachment"=>false));
// echo $html; ?>