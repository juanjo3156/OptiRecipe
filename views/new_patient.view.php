<?php require("templates/header.php") ?>
<div class="container new_pacient_container">
        <h2>Nuevo Paciente</h2>
        <i class="fa-solid fa-user-plus"></i>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-recipe" method="post">
            <div class="form-recipe__field">
                <label for="pacient_name">*Nombre: </label>
                <input id="pacient__name" type="text" name="name">
            </div>
            <div class="form-recipe__field">
                <label for="phone">*Numero de teléfono: </label>
                <input id="phone" type="text" name="phone">
            </div>
            
            <div class="form-recipe__field">
                <label for="date_of_birth">*Fecha de nacimiento: </label>
                <input id="date_of_birth" type="date" name="date_of_birth">
            </div>
            <div class="form-recipe__field">
                <label for="address">Dirección: </label>
                <input id="address" type="text" name="address">
            </div>
            <div class="form-recipe__field">
                <label for="email">Correo electrónico: </label>
                <input id="email" type="email" name="email">
            </div>
            <?php if($error!=''):?>
                <div class="error">
                    <ul>
                        <?php echo $error?>
                    </ul>
                </div>
            <?php endif;?> 
           
            <div class="form-recipe__field">
                
                <input type="submit" class="submit-button " value="Agregar">
                <a href="<?php echo RUTA?>consult_clients.php" class="cancel_button" value="Cancelar">Cancelar</a>

            </div>
        </form>
    </div>
<?php require("templates/footer.php") ?>
