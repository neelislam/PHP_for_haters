<?php
session_start();
if(isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
    echo "<script>alert('You have been logged out successfully.'); window.location.href='form_bootstrap.php';</script>";
}


?>