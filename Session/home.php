<?php

 session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    This is the home page <br>
    <form action="home.php" method="post">

    <input type="submit" name="logout" value="logout"><br>

    </form>
    <br>
    
</body>
</html>

<?php 
 echo "User name = " . $_SESSION["username"] . "<br>";

 echo "Password = " . $_SESSION["password"] . "<br>";

 if(isset($_POST["logout"])){
    session_unset();
    session_destroy();
    header("Location: index.php");
 }
?>