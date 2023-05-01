<?php 
require('config/config.php');
require('scripts/db.php');
require('scripts/functions.php');

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $username = clean_data(strtolower($_POST['username']));
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $email = $_POST['password2'];
    }


require('views/signup.view.php') ?>