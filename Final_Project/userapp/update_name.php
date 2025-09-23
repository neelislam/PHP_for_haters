<?php
session_start();
require_once 'functions.php'; // this should include config.php where $pdo is created

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = trim($_POST['full_name'] ?? '');

    if ($newName) {
        global $pdo; // ensure we use the $pdo defined in config.php

        $stmt = $pdo->prepare("UPDATE users SET full_name = ? WHERE id = ?");
        $stmt->execute([$newName, $_SESSION['user_id']]);

        $_SESSION['full_name'] = $newName; // update session so dashboard shows new name
        flash('success', 'Name updated successfully!');
    } else {
        flash('error', 'Name cannot be empty.');
    }
}

header("Location: dashboard.php");
exit;


$newName = trim($_POST['full_name'] ?? '');
if ($newName) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE users SET full_name = ? WHERE id = ?");
    $stmt->execute([$newName, $_SESSION['user_id']]);
    $_SESSION['full_name'] = $newName;
    flash('success', 'Name updated successfully.');
}
header("Location: dashboard.php");
exit;
?>