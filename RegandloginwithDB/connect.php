<?php

 $servername="localhost";
 $username="root";
 $password="";
 $databasename="wev_59c";
 $port=4307;  // Add the custom port

 // Include port in the connection
 $connect=@mysqli_connect($servername,$username,$password,$databasename,$port);

 if(!$connect){
    die("Connection failed: ".mysqli_connect_error());
 }
 // Remove the alert for cleaner testing
 // echo "<script>alert('database connected')</script>";

?>