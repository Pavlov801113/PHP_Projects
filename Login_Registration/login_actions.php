<?php
require 'header.php';
require_once('controller.php');
session_start();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){
        $login = new Controller;
        $user = $login->login($email);
        if(!$user){
            header('location:login.php?not found');
        } else {
            if(password_verify($password, $user->password)){
                $_SESSION['user_id'] = $user->id;
                header('location:index.php');
            } else {
                header('location:login.php?wrong_password');
            }
        }
    } else {
        header('location:login.php?empty_field');
    }
}