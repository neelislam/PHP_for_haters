<?php
include("connect.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    $email = $_POST['email'];                
    $password = $_POST['password']; 
    $duplicate = mysqli_query($conn, "SELECT * FROM `student` WHERE email='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo "Email already registered! <a href='login.php'>Login</a>";
    } else {
        $sql = "INSERT INTO `student`(`email`, `password`) VALUES ('$email','$password')";
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful! <a href='login.php'>Login</a>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">University</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="regis.php">Registration</a>
        </li>
          <a class="nav-link active" aria-current="page" href="dashboard.php">Dashboard</a>
    </div>
  </div>
</nav>

<h2>User Registration</h2>
<form method="post" action="">
    Email: <input type="email" name="email" required><br><br>
    Password: <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>

</body>
</html>
