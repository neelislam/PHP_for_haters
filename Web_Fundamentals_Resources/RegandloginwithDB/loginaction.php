<?php

if (isset($_POST['login'])) {
    include 'connect.php';

    $l_name = $_POST['name'];
    $l_pass = $_POST['pass'];

    $check = mysqli_query($connect, "SELECT * FROM `web_59_c` WHERE name='$l_name' AND password='$l_pass'");

    if(mysqli_num_rows($check)>0){
        session_start();
        $_SESSION['uname']=  $l_name;
        echo "<script>location.href='home.php'</script>";

    }else{
        echo "<script>alert('wrong username or password')</script>";
    echo "<script>location.href='login.php'</script>";

    }
} else {
    echo "<script>alert('donot access from url')</script>";
    echo "<script>location.href='login.php'</script>";
}
