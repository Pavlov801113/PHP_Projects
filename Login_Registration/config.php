<?php
try{
    $connect = new PDO('mysql:host=localhost; dbname=simple_login', 'root', '');
} catch(PDOException $e) {
    echo "<strong style=color: red;>Database Connection Error!</strong>" . '<mark>' . $e->getMessage() . '</mark>';
}