<?php 
require('config/config.php');
require('scripts/functions.php');
    $error = '';
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $username = clean_data(strtolower($_POST['username']));
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $email = $_POST['email'];
        if(empty($username) or empty($password) or empty($password2) or empty($email)){
            
            $error.= '<li>Por favor llena todos los campos</li>';

        }else{
            require('scripts/db.php');
            $statement = $connection->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
            $statement->bindParam(":username",$username);
            $statement->execute();
            $result = $statement->fetch();
    
            if($result != false){
                $error.='<li>El nombre de usuario ya existe</li>';
            }

            $statement = $connection->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $statement->bindParam(":email",$email);
            $statement->execute();
            $result = $statement->fetch();

            if($result != false){
                $error.='<li>El email ya ha sido utilizado por otro usuario</li>';
            }
        }
    }


require('views/signup.view.php') ?>