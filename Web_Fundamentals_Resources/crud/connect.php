<?php

 $servername="localhost";
 $username="root";
 $password="";
 $databasename="web_59c_crud";

 $connect=mysqli_connect($servername,$username,$password,$databasename);


 if(!$connect){
    die("Connection failed:".mysqli_connect_error());
 }else{
    echo "<script>alert('database connected')</script>";
 }




?>