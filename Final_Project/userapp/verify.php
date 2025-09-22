<?php
require_once 'functions.php';
$token = $_GET['token'] ?? '';

if (!$token) {
    echo "Invalid verification token.";
    exit;
}

$stmt = $pdo->prepare("SELECT id, is_verified FROM users WHERE verification_token = ?");
$stmt->execute([$token]);
$user = $stmt->fetch();

if (!$user) {
    echo "Invalid or expired token.";
    exit;
}
if ($user['is_verified']) {
    echo "Account already verified. You can log in.";
    exit;
}

$stmt = $pdo->prepare("UPDATE users SET is_verified = 1, verification_token = NULL WHERE id = ?");
$stmt->execute([$user['id']]);
echo "Email verified! You can now <a href='login.php'>log in</a>.";
