<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$current = $_POST['current_password'] ?? '';
$new = $_POST['new_password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if ($new !== $confirm || strlen($new) < 8) {
    flash('error', 'Passwords don’t match or too short (min 8 chars).');
    header("Location: dashboard.php");
    exit;
}

global $pdo;
$stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if ($user && password_verify($current, $user['password'])) {
    $hash = password_hash($new, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute([$hash, $_SESSION['user_id']]);
    flash('success', 'Password updated successfully.');
} else {
    flash('error', 'Current password is incorrect.');
}

header("Location: dashboard.php");
exit;
?>