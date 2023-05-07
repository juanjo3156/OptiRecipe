<?php require('templates/header.php'); ?>
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
                <input type="text" name="search" class="form-search__input" placeholder="Buscar...">
                <div class="form-search__bar">
                    <button type="submit" class="form-search__button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
                
            </form>
        </div>
        <div class="table container">
            <table class="table__content">
                <thead class="table__head">
                    <tr>
                        <th class="table__head-element"><h2>Paciente</h2></th>
                        <th class="table__head-element"><h2>Tel</h2></th>
                        <th class="table__head-element"><h2>Acciones</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient):?>
                    <tr class="table__row">
                        <td><?php echo $patient["name"]?></td>
                        <td class="center"><?php echo $patient["phone"]?></td>
                        <td class="table__actions">
                            <a href="<?php echo RUTA?>consult_recipe.php" class="button" ><i class="fa-solid fa-eye"></i></a>
                            <a href="<?php echo RUTA?>edit_patient.php?txtID=<?php echo $patient["patient_id"]?>" class="button-green"><i class="fa-solid fa-user-pen"></i></a>
                            <a href="<?php echo RUTA?>consult_clients.php?txtID=<?php echo $patient['patient_id']?>" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>

<?php require('templates/footer.php'); ?>