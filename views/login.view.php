<?php require('templates/header.php'); ?>
<div class="container">
    <div class="form-login">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-login__content" method="post">

            <h2>Inicio de sesión</h2>
            <i class="fa-solid fa-user"></i>

            <div class="form-login__field">
                <label for="username">Nombre de usuario:</label>
                
                    <input id="username" type="text" name="username" placeholder="Escriba su nombre de usuario">
                
            </div>
            
            <div class="form-login__field">
                <label for="pass">Contraseña:</label>
               
                    <input id="pass" type="password" name="password" placeholder="Escriba su contraseña">
                
            </div>
            <input class="form-login__button" type="submit" value="Entrar">
        </form>
    </div>
</div>
<?php require('templates/footer.php'); ?>