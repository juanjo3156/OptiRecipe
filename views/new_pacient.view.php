<?php require("templates/header.php") ?>
<div class="container new_pacient_container">
        <h2>Nuevo Paciente</h2>
        <i class="fa-solid fa-user-plus"></i>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-recipe" method="post">
            <div class="form-recipe__field">
                <label for="pacient_name">Nombre: </label>
                <input id="pacient__name" type="text">
            </div>
            <div class="form-recipe__field">
                <label for="birth_date">Fecha de nacimiento: </label>
                <input id="birth_date" type="date">
            </div>
            <div class="form-recipe__field">
                <label for="address">Dirección </label>
                <input id="address" type="text">
            </div>
            <div class="form-recipe__field">
                <label for="phone_number">Numero de teléfono: </label>
                <input id="phone_number" type="number">
            </div>
            <div class="form-recipe__field">
                
                <input type="submit" class="form-recipe-button submit-button " value="Agregar">
            </div>
        </form>
    </div>
<?php require("templates/footer.php") ?>
