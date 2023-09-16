<?php
function register($username, $email, $password){
    $conn = db_connect();
    $result = $conn->query("SELECT * FROM user WHERE username='" . $username . "'");
    if(!$result){
        throw new Exception('Could not execute query');
    }
    if($result->num_rows > 0){
        throw new Exception('That username is taken - go back and choose another one.');
    }
    $result = $conn->query("INSERT INTO user VALUES 
    ('" . $username . "', sha1('" . $password . "'), '" . $email . "')");
    if(!$result){
        throw new Exception('Could not register you in database - please try again later');
    }
    return true;
}
function login($username, $password){
    $conn = db_connect();
    $result = $conn->query("SELECT * FROM user WHERE username='" . $username . "'
    AND passwd = sha1('" . $password . "')");
    if(!$result){
        throw new Exception('Could not log you in.');
    }
    if($result->num_rows > 0){
        return true;
    } else {
        return false;
    }
}
function check_valid_user(){
    if(isset($_SESSION['valid_user'])){
        echo "Logged in as " . $_SESSION['valid_user'] . "<br>";
    } else {
        html_heading('Problem:');
        echo "You are not logged in!<br>";
        html_URL('login.php', 'Login');
        html_footer();
        exit;
    }
}