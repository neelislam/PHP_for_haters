<?php
    $r_username="admin";
    $r_pass ="admin";

   $l_username=$_POST['l_username'];
   $l_pass=$_POST['l_pass'];
   
    session_start();
    if(isset($_SESSION['l_username'])){
        echo "<h3>Hello ".$_SESSION['l_username']."</h3>";
        echo "<br><a href='product.php'><input type='button' value='PRODUCT
        ' name='PRODUCT'></a>";
        echo "<br><a href='logout.php'><input type='button' value='logout' name='logout'></a>";

    } else{ 
        if(isset($_POST['login'])){
            if( $l_username==$r_username &&  $l_pass==$r_pass){
                $_SESSION['l_username'] = $r_username;
                echo "<script>location.href='home.php'</script>";
            }else{
                echo "<script>alert('Incorrect username or password')</script>";
                echo "<script>location.href='login.php'</script>";
            }

        }else{
            echo "<script>alert('DO NOT ACCESS FROM URL')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }  
   
?>