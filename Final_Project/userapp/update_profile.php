<?php
require_once 'functions.php';
if (!is_logged_in()) { header('Location: login.php'); exit; }

$full_name = trim($_POST['full_name'] ?? '');
$bio = trim($_POST['bio'] ?? '');
$new_pw = $_POST['new_password'] ?? '';

if (!$full_name) {
    flash('error','Name cannot be empty.');
    header('Location: edit_profile.php'); exit;
}

$user_id = $_SESSION['user_id'];
if ($new_pw) {
    if (strlen($new_pw) < 8) {
        flash('error','Password must be at least 8 characters.');
        header('Location: edit_profile.php'); exit;
    }
    $hash = password_hash($new_pw, PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("UPDATE users SET full_name = ?, bio = ?, password = ? WHERE id = ?");
    $stmt->execute([$full_name, $bio, $hash, $user_id]);
} else {
    $stmt = $pdo->prepare("UPDATE users SET full_name = ?, bio = ? WHERE id = ?");
    $stmt->execute([$full_name, $bio, $user_id]);
}

header('Location: profile.php');
exit;
