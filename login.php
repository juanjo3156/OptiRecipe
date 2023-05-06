<?php 
session_start();
require('config/config.php');
require('scripts/db.php');
require('scripts/functions.php');
$error = '';
   
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username = clean_data(filter_var(strtolower($_POST['username']),FILTER_SANITIZE_STRING));
    $password = hash('sha512', $_POST['password']);
    $statement = $connection->prepare('SELECT * FROM users WHERE username = :username AND password = :password ');
    $statement->execute(array(":username"=>$username,":password"=>$password));
    $result = $statement->fetch();

        if(empty($username) or empty($password)){
            $error.= '<li>Por favor llena todos los campos</li>';
        }else{
            if($result != false){
                $_SESSION['user'] = $username;
                
        
                header('Location:'.RUTA.'index.php');
            }else{
                $error.= '<li>Nombre de usuario o contraseña incorrectos</li>';
            }
        }
   
    
}
require('views/login.view.php');
?>