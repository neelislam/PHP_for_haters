<?php
session_start();
require_once 'functions.php'; // includes config.php and helpers

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

// Get POST data
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

// Basic validation
if (!$email || !$password) {
    flash('error', 'Please enter both email and password.');
    header('Location: login.php');
    exit;
}

global $pdo;

// Fetch user by email
$stmt = $pdo->prepare("SELECT id, full_name, email, password, is_verified FROM users WHERE email = ?");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user) {
    flash('error', 'Email not found.');
    header('Location: login.php');
    exit;
}

// Verify password
if (!password_verify($password, $user['password'])) {
    flash('error', 'Incorrect password.');
    header('Location: login.php');
    exit;
}

// Check if verified
if (!$user['is_verified']) {
    flash('error', 'Please verify your email first.');
    header('Location: login.php');
    exit;
}

// ✅ Login successful → save user info in session
$_SESSION['user_id']    = $user['id'];
$_SESSION['full_name']  = $user['full_name'];
$_SESSION['email']      = $user['email'];

// Redirect to dashboard
header('Location: dashboard.php');
exit;
?>
