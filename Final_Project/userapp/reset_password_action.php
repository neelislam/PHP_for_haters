<?php
require_once 'functions.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { exit; }
$token = $_POST['token'] ?? '';
$pw = $_POST['password'] ?? '';
$cpw = $_POST['confirm_password'] ?? '';

if (!$token || !$pw || $pw !== $cpw || strlen($pw) < 8) {
    echo "Invalid input."; exit;
}

$stmt = $pdo->prepare("SELECT id, user_id, expires_at FROM password_resets WHERE token = ?");
$stmt->execute([$token]);
$rec = $stmt->fetch();
if (!$rec || strtotime($rec['expires_at']) < time()) {
    echo "Token invalid or expired."; exit;
}

$hash = password_hash($pw, PASSWORD_DEFAULT);
$pdo->prepare("UPDATE users SET password = ? WHERE id = ?")->execute([$hash, $rec['user_id']]);
$pdo->prepare("DELETE FROM password_resets WHERE id = ?")->execute([$rec['id']]);

echo "Password changed. <a href='login.php'>Login</a>";
