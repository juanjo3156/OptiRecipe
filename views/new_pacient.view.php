<?php require("templates/header.php") ?>
<div class="form-container container">
        <i class="fa-solid fa-sheet-plastic"></i>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="new_recipe">
            <div class="new_recipe__field">
                <label for="pacient_name">Nombre: </label>
                <input id="pacient__name" type="text">
            </div>
            <div class="new_recipe__field">
                <label for="birth_date">Fecha de nacimiento: </label>
                <input id="birth_date" type="date">
            </div>
            <div class="new_recipe__field">
                <label for="address">Dirección </label>
                <input id="address" type="text">
            </div>
            <div class="new_recipe__field">
                <label for="phone_number">Numero de teléfono: </label>
                <input id="phone_number" type="number">
            </div>
            <div class="new_recipe__field">
                
                <input type="submit" class="submit-button">
            </div>
        </form>
    </div>
<?php require("templates/footer.php") ?>
