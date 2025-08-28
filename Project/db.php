<?php
$servername = "127.0.0.1";
$username   = "root";
$password   = "";
$database   = "myshop";
$port       = 4306;

$connection = new mysqli($servername, $username, $password, $database, $port);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
