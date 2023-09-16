<?php
function db_connect(){
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'bookmarks');
    $connect = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$connect){
        throw new Exception('Could not connect to database server!');
    } else {
        return $connect;
    }
}