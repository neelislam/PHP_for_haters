<?php
require_once 'functions.php';
session_start(); // Must be before any echo or HTML

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php'); 
    exit;
}

$full_name = trim($_POST['full_name'] ?? '');
$email     = trim($_POST['email'] ?? '');
$password  = $_POST['password'] ?? '';
$confirm   = $_POST['confirm_password'] ?? '';

// Validation
if (!$full_name || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8 || $password !== $confirm) {
    flash('error', 'Invalid input or passwords don\'t match (min 8 chars).');
    header('Location: register.php'); 
    exit;
}

global $pdo;

// Check email
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    flash('error', 'Email already registered.');
    header('Location: register.php'); 
    exit;
}

// Create user
$hash = password_hash($password, PASSWORD_DEFAULT);
$token = bin2hex(random_bytes(16));

$stmt = $pdo->prepare("INSERT INTO users (full_name, email, password, verification_token) VALUES (?, ?, ?, ?)");
if (!$stmt->execute([$full_name, $email, $hash, $token])) {
    flash('error', 'Something went wrong while registering. Try again.');
    header('Location: register.php'); 
    exit;
}

// Send verification email
$verifyLink = BASE_URL . "verify.php?token=" . $token;
$subject = "Verify your email for UserApp";
$body = "<p>Hello " . htmlspecialchars($full_name) . ",</p>
<p>Click the link below to verify your email:</p>
<p><a href='{$verifyLink}'>Verify Email</a></p>
<p>If you didn't register, ignore this email.</p>";

// Send email
if (!send_email($email, $subject, $body)) {
    flash('error', 'Registered but failed to send verification email. Check SMTP settings.');
    header('Location: register.php');
    exit;
}

// Success
flash('success', 'Registered successfully! Check your email to verify your account.');
header('Location: register_result.php');
exit;
?>