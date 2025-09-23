<?php
session_start();
require_once 'functions.php'; // includes config.php, helpers

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    flash('error', 'Please enter both email and password.');
    header('Location: login.php');
    exit;
}

global $pdo;

// Fetch user
$stmt = $pdo->prepare("SELECT id, full_name, password, is_verified FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    flash('error', 'User does not exist.');
    header('Location: login.php');
    exit;
}

// Verify password
if (!password_verify($password, $user['password'])) {
    flash('error', 'Incorrect password.');
    header('Location: login.php');
    exit;
}

// Check email verification
if (!$user['is_verified']) {
    flash('error', 'Please verify your email first.');
    header('Location: login.php');
    exit;
}

// Login successful
$_SESSION['user_id'] = $user['id'];
$_SESSION['full_name'] = $user['full_name'];

header('Location: dashboard.php');
exit;
?>