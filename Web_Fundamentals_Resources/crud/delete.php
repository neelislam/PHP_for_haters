<?php

include 'connect.php';
$id=$_GET['id'];
mysqli_query($connect,"DELETE FROM `crud` WHERE id='$id'");
header('location:index.php');


?>