<?php

include 'connect.php';

$id=$_POST['id'];
$name=$_POST['name'];
$price=$_POST['price'];
$image=$_FILES['image'];

$imagelocation=$_FILES['image']['tmp_name'];
$imagename=$_FILES['image']['name'];
$image_final_des="image/".$imagename;

move_uploaded_file($imagelocation,$image_final_des);

$updatequery="UPDATE `crud` SET `name`='$name',`price`='$price',`image`='$image_final_des' WHERE id='$id'";

if(mysqli_query($connect,$updatequery)){
    echo "<script>alert('updated')</script>";
    header('location:index.php');
}



?>