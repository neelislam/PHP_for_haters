<?php
include("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $name     = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $reg_date = date("Y-m-d H:i:s");

    $sql = "INSERT INTO users (email, name, password, reg_date) 
            VALUES ('$email', '$name', '$password', '$reg_date')";

    if (mysqli_query($conn, $sql)) {
        echo "✅ Registration successful! <a href='login.php'>Login</a>";
    } else {
        echo "❌ Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="">
        Email: <input type="email" name="email" required><br><br>
        Name: <input type="text" name="name" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
</body>
</html>
