<?php
include 'connect.php';
session_start();

if(isset($_SESSION['uname'])){
  echo "welcome to our site ".  $_SESSION['uname'];
  echo "<a href='logout.php'><input type='button' value='Logout' class='btn btn-secondary'></a>";
}



?>