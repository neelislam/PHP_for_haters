<?php
    session_start();
    if(isset($_SESSION['l_username'])){
        echo "<h3>HELLO </h3>";
        include 'food.php';
        echo "<br><a href='logout.php'><input type='button' value='logout' name='logout'></a>";

   }else{

        echo "<script>location.href='login.php'</script>";
   }



?>