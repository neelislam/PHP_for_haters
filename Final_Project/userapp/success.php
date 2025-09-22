<?php
// success.php
session_start();
$message = $_SESSION['flash']['success'] ?? "Action completed successfully!";
unset($_SESSION['flash']['success']); // clear flash message
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success | UserApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            max-width: 500px;
            margin: 100px auto;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .btn-home {
            background-color: #0d6efd;
            color: white;
        }
        .btn-home:hover {
            background-color: #0b5ed7;
            color: white;
        }
    </style>
</head>
<body>
    <div class="card text-center p-4">
        <div class="card-body">
            <h3 class="card-title text-success mb-3">🎉 Success!</h3>
            <p class="card-text mb-4"><?= htmlspecialchars($message) ?></p>
            <a href="login.php" class="btn btn-home">Go to Login</a>
        </div>
    </div>
</body>
</html>
