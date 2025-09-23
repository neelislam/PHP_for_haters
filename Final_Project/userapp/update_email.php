<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$newEmail = trim($_POST['email'] ?? '');
if ($newEmail && filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET email = ? WHERE id = ?");
    $stmt->execute([$newEmail, $_SESSION['user_id']]);
    $_SESSION['email'] = $newEmail;
    flash('success', 'Email updated successfully.');
}
header("Location: dashboard.php");
exit;
?>