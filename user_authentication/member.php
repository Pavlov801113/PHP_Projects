<?php
require_once('bookmark_functions.php');
session_start();
if(!isset($_POST['username'])){
    $_POST['username'] = " ";
}
$username = $_POST['username'];
if(isset($_POST['passwd'])){
    $_POST['passwd'] = " ";
}
$passwd = $_POST['passwd'];
if($username && $passwd){
    try{
        login($username, $passwd);
        $_SESSION['valid_user'] = $username;
    }
    catch(Exception $e) {
        html_header('Problem:');
        echo 'You could not logged in .<br>You must logged to view this page.';
        html_URL('login.php', 'Login');
        html_footer();
        exit();
    }
}
html_header('Home');
check_valid_user();
if($url_array = get_user_urls($_SESSION['vaqlid_user'])){
    display_user_urls($url_array);
}
display_user_menu();
html_footer();