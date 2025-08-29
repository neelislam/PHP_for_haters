<?php
$db_server = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name = "businessdb";
$conn = "";
$port       = 4306;

$conn = mysqli_connect(
    $db_server,
    $db_user,
    $db_pass, 
    $db_name,
    $port 
);


if($conn){
 echo "Connected to Database <br>";
} else{
    echo "Connection failed" . mysqli_connect_error();
}
?>