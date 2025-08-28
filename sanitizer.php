<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senitizer</title>
</head>
<body>
    <form action="sanitizer.php" method="post">
        username: <br>
        <input type="text" name="username"><br>


        phone: <br>
        <input type="text" name="phone"><br>

        email: <br>
        <input type="text" name="email"><br>
        <input type="submit" name="login" value="login"><br>


    </form>
    
</body>
</html>


<?php



if(isset($_POST["login"])){
    $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
    $phone =  filter_input(INPUT_POST, "phone", FILTER_SANITIZE_NUMBER_INT);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    echo "Hellow {$username} <br>";
    echo "Your phone number is {$phone} <br>";
    echo "Your email is {$email} <br>";
}

if(empty($phone)){
    echo "phone number is invalid!!! <br>";
} else {
    echo "Your phone number is {$phone} :)  <br>";
}
?>