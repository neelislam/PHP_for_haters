<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <form action="login_form.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username"><br>
        <label>Password:</label><br>
        <input type="password" name="password"><br>
        <input type="submit" name="login" value="Log in"><br>
    </form>
</body>
</html>


<?php

foreach($_POST as $key => $value ){
    echo "{$key} = {$value} <br>";

}
    



if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    if(empty($username)){
        echo"user name is missing";
    } else if(empty($password)){
            echo"password is missing";
        } else{
              echo"Hello {$username} <br>";
        }
}




?>