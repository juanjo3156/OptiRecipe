<?php require("templates/header.php"); ?>

<div class="form_new_container container">
            <h2>Configuración de su Óptica</h2>
            <i class="fa-solid fa-glasses"></i>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="form-recipe" method="POST">

            <div class="form-recipe__field">
                <label for="enterprise_name">Nombre de la empresa:</label>
                <input id="enterprise_name" type="text" name="enterprise_name" value="<?php echo $result["enterprise_name"]?>">
            </div>
            
            <div class="form-recipe__field">
                <label for="address">Dirección:</label>
                    <input id="address" type="text" name="address" value="<?php echo $result["address"]?>">
            </div>
            <div class="form-recipe__field">
                <label for="phone">Número de Teléfono:</label>
                    <input id="phone" type="text" name="phone_number" value="<?php echo $result["phone_number"]?>">
            </div>
            <div class="form-recipe__field">
                <input class="save_button" type="submit" value="Guardar configuración">
                <a href="<?php echo RUTA?>" class="cancel_button" type="submit">Cancelar</a>
                
            </div>
            <div class="form-recipe__field">
                
            <a href="<?php echo RUTA?>restore_config.php" class="submit-button" type="submit">Restaurar por defecto</a>
                
            </div>
            
           
        </form>
       
    
    </div>
<?php require("templates/footer.php"); ?>