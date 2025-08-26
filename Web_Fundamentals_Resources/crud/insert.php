<?php

include 'connect.php';

$name=$_POST['name'];
$price=$_POST['price'];
$image=$_FILES['image'];

$imagelocation=$_FILES['image']['tmp_name'];
$imagename=$_FILES['image']['name'];
$image_final_des="image/".$imagename;

move_uploaded_file($imagelocation,$image_final_des);

$insertquery="INSERT INTO `crud`(`name`, `price`, `image`) VALUES ('$name','$price','$image_final_des')";

if(mysqli_query($connect,$insertquery)){
    echo "<script>alert('inserted')</script>";
    header('location:index.php');
}



?>