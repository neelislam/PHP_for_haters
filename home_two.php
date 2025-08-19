<?php
session_start();

$r_name = "a@a";
$r_pass = "123";

// Check if form submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['user']) && isset($_POST['password'])) {
        $l_name = htmlspecialchars($_POST['user']);
        $l_pass = htmlspecialchars($_POST['password']);

        if ($l_name === $r_name && $l_pass === $r_pass) {
            $_SESSION['user'] = $l_name;
            echo "<script>alert('Welcome to the site'); window.location.href='home_two.php';</script>";
            exit;
        } else {
            echo "<script>alert('Invalid credentials'); window.location.href='form_bootstrap.php';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Do not access directly'); window.location.href='form_bootstrap.php';</script>";
        exit;
    }
}

// If already logged in
if (isset($_SESSION['user'])) {
    echo "Welcome back " . $_SESSION['user'] . "<br>";
    echo "<a href='home.php'>Go to Home</a><br>";
    echo "<a href='logout.php' class='btn btn-danger'>Logout</a>";
}
?>
