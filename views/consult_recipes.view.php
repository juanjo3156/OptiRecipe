<?php require('templates/header.php'); ?>
        <h2 class="tittle">Recetas</h2>
        <div class="table container">
            <table class="table__content">
                <thead class="table__head">
                    <tr>
                        <th class="table__head-element"><h2>Paciente</h2></th>
                        <th class="table__head-element"><h2>Acciones</h2></th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table__row">
                        <td>Juan José Ruiz Cruz</td>
                        <td class="table__actions">
                            <a href="#" class="button" ><i class="fa-solid fa-eye"></i></a>
                            <a href="#" class="button-green"><i class="fa-solid fa-user-pen"></i></a>
                            <a href="#" class="button-red"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

<?php require('templates/footer.php'); ?>