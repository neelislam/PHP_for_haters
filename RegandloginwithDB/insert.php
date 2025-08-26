<?php
include 'connect.php';

$r_name  = $_POST['name'];
$r_email = $_POST['email'];
$r_phone = $_POST['phone'];                 
$r_pass  = $_POST['pass'];
$r_cpass = $_POST['cpass'];

$emailpattern = "/(cse|eee|bua|law)_\d{16}@lus\.ac\.bd/";
$phonepattern = "/(\+88)?01[3-9]\d{8}/";

$duplicate = mysqli_query($connect,"SELECT * FROM `web_59_c` WHERE email='$r_email'");

if (strlen($r_name) < 2 || strlen($r_name) > 20) {
    echo "<script>alert('name must be 2-20 characters')</script>";
    echo "<script>location.href='register.php'</script>";
} else if (!preg_match($emailpattern, $r_email)) {
    echo "<script>alert('email is invalid')</script>";
    echo "<script>location.href='register.php'</script>";
} else if (!preg_match($phonepattern, $r_phone)) {
    echo "<script>alert('phone is invalid')</script>";
    echo "<script>location.href='register.php'</script>";
} else if ($r_pass !== $r_cpass) {
    echo "<script>alert('password not matching')</script>";
    echo "<script>location.href='register.php'</script>";
} else if (mysqli_num_rows($duplicate) > 0) {
    echo "<script>alert('email already exists')</script>";
    echo "<script>location.href='register.php'</script>";
} else {
    $insertquery = "INSERT INTO `web_59_c`(`name`, `email`, `phone`, `password`) 
                    VALUES ('$r_name','$r_email','$r_phone','$r_pass')";
    if(!mysqli_query($connect, $insertquery)){
        die("not inserted: ".mysqli_error($connect));
    } else {
        echo "<script>alert('Registration successful!')</script>";
        echo "<script>location.href='login.php'</script>";
    }
}
?>
