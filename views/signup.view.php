<?php require('templates/header.php');?>
<div class="container form-signup">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="form-signup__content" method="post">
        <h2>Crea tu usuario</h2>
        <div class="form-signup__field">
            <label for="username">Nombre de usuario:</label>
            
            <input type="text" id="username" name="username" placeholder="Escribe un nombre de usuario">
            
        </div>
        <div class="form-signup__field">
            <label for="password">Contraseña:</label>
            
            <input type="text" id="password" name="password" placeholder="Escribe una contraseña">
            <br>
            <input type="text" id="password" name="password2" placeholder="Repite la contraseña">
            
        </div>
        <div class="form-signup__field">
            <label for="email">Email:</label>
           
            <input type="email" id="email" name="email" placeholder="Escribe tu email">
            
        </div>
        <input type="submit" value="Registrar" class="form-signup__button">
    </form>
</div>
<?php require('templates/footer.php');?>