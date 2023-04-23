<?php require('templates/header.php');?>   
<div class="recipe-head container ">
    <h2 class="patient">Paciente: Juan José Ruiz Cruz</h2>
    <a class="back-button"href="<?php echo RUTA?>consult_clients.php">
        <i class="fa-solid fa-arrow-left"></i>
        <p>Atrás</p>
    </a>
</div>   
        <div class="table container">
            <table class="table__content">
                <thead class="table__head">
                    <tr>
                        <th class="table__head-element"><h2>ID</h2></th>
                        <th class="table__head-element"><h2>Fecha</h2></th>
                        
                        <th class="table__head-element"><h2>Acciones</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table__row">
                        <td>03</td>
                        <td>10/01/2023</td>
                        <td class="table__actions">
                            <a href="#" class="button" ><i class="fa-solid fa-eye"></i></a>
                            <a href="#" class="button-green"><i class="fa-solid fa-user-pen"></i></a>
                            <a href="#" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
<?php require('templates/footer.php');?>