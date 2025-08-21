<?php
session_start();

if(isset($_POST['register_btn'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $_SESSION['status'] = "Invalid email format!";
        header("Location: register.php");
        exit();
    }

    // Load existing users from file
    $file = "users.json";
    $users = [];
    if(file_exists($file)){
        $users = json_decode(file_get_contents($file), true);
    }

    // Check if email exists
    foreach($users as $u){
        if($u['email'] === $email){
            $_SESSION['status'] = "Email already exists!";
            header("Location: register.php");
            exit();
        }
    }

    // Save new user
    $users[] = [
        "name" => $name,
        "phone" => $phone,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ];
    file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));

    $_SESSION['status'] = "Registered successfully! Please login.";
    header("Location: login.php");
}
?>
