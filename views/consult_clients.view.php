<?php require('templates/header.php'); ?>
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
        <div class="recipe-head container">
            <a class="black-button"href="<?php echo RUTA?>">
            <i class="fa-solid fa-house-chimney"></i>
            <p>Menu principal</p>
            </a>
            <a class="black-button"href="<?php echo RUTA?>new_patient.php">
            <i class="fa-solid fa-user-plus"></i>
            <p>Agregar Paciente</p>
            </a>
            <form class="form-search"action="">
                <input type="text" name="search" class="form-search__input" placeholder="Buscar por nombre...">
                <div class="form-search__bar">
                    <button type="submit" class="form-search__button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
            </form>
        </div>
        <div class="table container">
        <?php if(count($patients) > 0): // Verificar si se encontraron resultados ?>
           
            <table class="table__content">
                <thead class="table__head">
                    <tr>
                        <th class="table__head-element"><h2>Paciente</h2></th>
                        <th class="table__head-element"><h2>Tel</h2></th>
                        <th class="table__head-element"><h2>Correo electrónico</h2></th>
                        <th class="table__head-element"><h2>Acciones</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient):?>
                    <tr class="table__row">
                        <td><?php echo $patient["name"]?></td>
                        <td class="center"><?php echo $patient["phone"]?></td>
                        <td class="center"><?php echo $patient["email"]?></td>
                        <td class="table__actions">
                            <a href="<?php echo RUTA?>consult_recipe.php?txtID=<?php echo $patient["patient_id"]?>" class="button" ><i class="fa-solid fa-eye"></i></a>
                            <a href="<?php echo RUTA?>edit_patient.php?txtID=<?php echo $patient["patient_id"]?>" class="button-green"><i class="fa-solid fa-user-pen"></i></a>
                            <a href="javascript:borrar(<?php echo $patient["patient_id"]?>);" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                <?php else: // Si no hay resultados, mostrar mensaje ?>
                    <div class="center search-error">
                        <p>No se encontraron pacientes con el término:"<?php echo $searchQuery; ?>"</p>
                        <a class="submit-button" href="<?php echo RUTA?>consult_clients.php">Volver</a>
                    </div>
                   
                <?php endif; ?>
                </tbody>
                
            </table>
            
            </div>
            <script>
                function borrar(id){
                    Swal.fire({
                    title: '¿Seguro que deseas borrar al paciente?',
                    text: "Esta acción no se puede revertir",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#007E07',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, borrar paciente!',
                    cancelButtonText: 'No, cancelar!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        
                        window.location = "<?php echo RUTA?>delete_patient.php?delete_id="+id;
                        
                    }
                    })

                                    }
            </script>
<?php require('templates/footer.php'); ?>