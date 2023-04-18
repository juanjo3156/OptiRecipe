<?php require('templates/header.php'); ?>
<div class="container">
    <div class="form-login">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="form-login__content">
                <label for="username">Nombre de usuario:</label>
                <input id="username" type="text" name="username">
            </div>
            
            <div class="form-login__content">
                <label for="pass">Contraseña:</label>
                <input id="pass" type="text" name="password">
            </div>
            
        </form>
    </div>
</div>
<?php require('templates/footer.php'); ?>