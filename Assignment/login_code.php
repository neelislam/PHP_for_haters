<?php
session_start();

if(isset($_POST['login_btn'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $file = "users.json";
    if(!file_exists($file)){
        $_SESSION['status'] = "No users registered!";
        header("Location: login.php");
        exit();
    }

    $users = json_decode(file_get_contents($file), true);

    foreach($users as $u){
        if($u['email'] == $email && ($password == $u['password'])){
            $_SESSION['auth'] = true;
            $_SESSION['auth_user'] = $u;
            $_SESSION['status'] = "Login successful!";
            header("Location: dashboard.php");
            exit();
        }
    }

    $_SESSION['status'] = "Invalid email or password!";
    header("Location: login.php");
}
?>
