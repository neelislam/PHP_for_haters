<?php
session_start();
require_once 'functions.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
global $pdo;

try {
    // Delete the user from DB
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$user_id]);

    // Clear session
    session_unset();
    session_destroy();

    // Redirect with success message
    session_start();
    flash('success', 'Your account has been deleted successfully.');
    header("Location: register.php"); // back to registration page
    exit;
} catch (Exception $e) {
    flash('error', 'Failed to delete account. Please try again.');
    header("Location: profile.php");
    exit;
}
?>