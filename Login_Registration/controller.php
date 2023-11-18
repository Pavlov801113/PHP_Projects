<?php
require ('config.php');
class Controller
{
    public function registration($name, $email, $password){
        global $connect;
        $sql = $connect->prepare('INSERT INTO simple_user(name, email,password) VALUES (?,?,?)');
        $sql->execute([
            $name,
            $email,
            $password
        ]);
    }

    public function check_email($email){
        global $connect;
        $sql = $connect->prepare('SELECT email FROM simple_user WHERE email=?');
        $sql->execute([
            $email
        ]);
        if($sql->rowCount() > 0){
            return true;
        } else {
            return false;
        }
    }

    public function login($email){
        global $connect;
        $sql = $connect->prepare('SELECT * FROM simple_user WHERE email=?');
        $sql->execute([$email]);
        return $sql->fetch(PDO::FETCH_OBJ);
    }
}