<?php
session_start();
require_once 'functions.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user = current_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome | UserApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .card { max-width: 500px; margin: 100px auto; border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
        .btn-home { background-color: #0d6efd; color: white; }
        .btn-home:hover { background-color: #0b5ed7; color: white; }
    </style>
</head>
<body>
    <div class="card text-center p-4">
        <div class="card-body">
            <h3 class="card-title mb-3">🎉 Welcome, <?= htmlspecialchars($user['full_name']) ?>!</h3>
            <p class="card-text mb-4">You have successfully logged in.</p>
            <a href="logout.php" class="btn btn-home">Logout</a>
        </div>
    </div>
</body>
</html>
