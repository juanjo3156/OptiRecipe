<?php require('templates/header.php');?>   
<div class="recipe-head container ">
    <h2 class="patient">Paciente: <?php echo $patient_info["name"]?></h2>
    <a class="black-button"href="<?php echo RUTA?>consult_clients.php">
        <i class="fa-solid fa-arrow-left"></i>
        <p>Atrás</p>
    </a>
    <a class="black-button"href="<?php echo RUTA?>new_recipe.php">
        <i class="fa-solid fa-file-circle-plus"></i>
        <p>Agregar Receta</p>
    </a>
</div>   
        <div class="table container">
            <table class="table__content">
                <thead class="table__head">
                    <tr>
                        <th class="table__head-element"><h2>Folio</h2></th>
                        <th class="table__head-element"><h2>Fecha</h2></th>
                        <th class="table__head-element"><h2>Acciones</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($recipes as $recipe): ?>
                        <?php $prescriptionDate = date('d/m/Y', strtotime($recipe['date']));?>
                        <tr class="table__row">
                        <td><?php echo $recipe["folio"]?></td>
                        <td class="center"><?php echo $prescriptionDate?></td>
                        <td class="table__actions">
                            <a href="#" class="button" ><i class="fa-solid fa-file-pdf"></i></i></a>
                            <a href="<?php echo RUTA?>edit_recipe.php?patient_id=<?php echo $patient_info["patient_id"]?>&recipe_id=<?php echo $recipe["prescription_id"]?>"" class="button-green"><i class="fa-solid fa-pen-to-square"></i></i></a>
                            <a href="<?php echo RUTA?>delete_recipe.php?patient_id=<?php echo $patient_info["patient_id"]?>&recipe_id=<?php echo $recipe["prescription_id"]?>" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- <tr class="table__row">
                        <td>03</td>
                        <td>10/01/2023</td>
                        <td class="table__actions">
                            <a href="#" class="button" ><i class="fa-solid fa-file-pdf"></i></i></a>
                            <a href="#" class="button-green"><i class="fa-solid fa-pen-to-square"></i></i></a>
                            <a href="#" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
<?php require('templates/footer.php');?>