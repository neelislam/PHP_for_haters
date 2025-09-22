<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php'); 
    exit;
}

// Get input values
$full_name = trim($_POST['full_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

// Server-side validation
if (!$full_name || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8 || $password !== $confirm) {
    flash('error', 'Invalid input or passwords don\'t match (min 8 chars).');
    header('Location: register.php'); 
    exit;
}

global $pdo;

// Check if email exists
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
$stmt->execute([$full_name, $email, $hash, $token]);

// Prepare verification email
$verifyLink = BASE_URL . "verify.php?token=" . $token;
$subject = "Verify your email for UserApp";

$body = "
<!DOCTYPE html>
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Email Verification</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:0; }
  .container { max-width: 600px; margin:40px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1); }
  h2 { color:#333; }
  p { color:#555; line-height:1.5; }
  a.button { display:inline-block; padding:12px 20px; margin:20px 0; background-color:#28a745; color:#fff; text-decoration:none; border-radius:5px; }
  a.button:hover { background-color:#218838; }
  .footer { font-size:12px; color:#999; margin-top:20px; }
</style>
</head>
<body>
  <div class='container'>
    <h2>Email Verification</h2>
    <p>Hello " . htmlspecialchars($full_name) . ",</p>
    <p>Thank you for registering! Click the button below to verify your email:</p>
    <a href='{$verifyLink}' class='button'>Verify Email</a>
    <p>If you didn't register, you can safely ignore this email.</p>
    <div class='footer'>UserApp &copy; 2025</div>
  </div>
</body>
</html>
";

// Send email
$emailSent = send_email($email, $subject, $body);

// Redirect to result page
session_start();
if ($emailSent) {
    flash('success', 'Registered successfully! Check your email to verify your account.');
} else {
    flash('error', 'Registered but failed to send verification email. Contact the admin.');
}
header('Location: register_result.php');
exit;
