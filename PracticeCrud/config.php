<?php

$host = '127.0.0.1';
$user = 'root';
$pass = '';
$db = 'crud_practice';
$port = '4306';

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if(!$conn){
    die('database connection failed: ' . mysqli_connect_errno());

}
mysqli_set_charset($conn, 'utf8mb4');
?>