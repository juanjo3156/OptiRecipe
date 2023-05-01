<?php require('templates/header-login.php'); ?>

    <div class="form-login container">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="form-login__content" method="POST">

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
        <!-- <?php if($error!=''):?>
        <div class="error">
            <ul>
                <?php echo $error?>
            </ul>
        </div>
    <?php endif;?> -->
    
    </div>
    <div class="container center link">
        <p>¿No tienes un usuario?</p>
        <a href="<?php echo RUTA?>signup.php">Regístrate</a>
    </div>
<?php require('templates/footer.php'); ?>