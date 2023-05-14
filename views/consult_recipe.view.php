<?php require('templates/header.php');?>   
<?php if(isset($_GET['msg'])){ ?>
<script>
    Swal.fire(
        {
            icon:"success",
            title:"<?php echo $_GET['msg']?>"
        }
        );
</script>
<?php } ?>
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
                            <a href="<?php echo RUTA?>scripts/generate_pdf.php?patient_id=<?php echo $patient_info["patient_id"]?>&recipe_id=<?php echo $recipe["prescription_id"]?>" class="button"  target="_blank"><i class="fa-solid fa-file-pdf"></i></i></a>
                            <a href="<?php echo RUTA?>edit_recipe.php?patient_id=<?php echo $patient_info["patient_id"]?>&recipe_id=<?php echo $recipe["prescription_id"]?>" class="button-green"><i class="fa-solid fa-pen-to-square"></i></i></a>
                            <a href="javascript:delete_r(<?php echo $patient_info["patient_id"]?>,<?php echo $recipe["prescription_id"]?>);" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <script>
            function delete_r(patient_id,recipe_id){
                Swal.fire({
                title: '¿Seguro que deseas borrar la receta?',
                text: "Esta acción no se puede revertir",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#007E07',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, borrar receta!',
                cancelButtonText: 'No, cancelar!'
                }).then((result) => {
                if (result.isConfirmed) {
                        
                    window.location = "<?php echo RUTA?>delete_recipe.php?delete_id="+patient_id+"&recipe_id="+recipe_id;
                        
                }
                })

                    }
            </script>
<?php require('templates/footer.php');?>