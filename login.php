<?php 
session_start();
require('config/config.php');
require('scripts/db.php');
require('scripts/functions.php');
$error = '';
   
if($_SERVER['REQUEST_METHOD']=="POST"){
    echo "Entraste";
    $username = clean_data(filter_var(strtolower($_POST['username']),FILTER_SANITIZE_STRING));
    $password = $_POST['password'];
    $password = $password;
    $statement = $connection->prepare('SELECT * FROM users WHERE username = :username AND password = :password ');
    $statement->execute(array(":username"=>$username,":password"=>$password));
    $result = $statement->fetch();

    if($result != false){
        $_SESSION['user'] = $username;
        echo "usuario conectado";

        header('Location:'.RUTA.'index.php');
    }else{
        $error.= '<li>Incorrect username or password</li>';
    }
    
}
require('views/login.view.php');
?>