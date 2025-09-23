<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require_once 'functions.php'; // to use $pdo

// Fetch latest user info from DB (in case updated)
global $pdo;
$stmt = $pdo->prepare("SELECT id, full_name, email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if (!$user) {
    // If somehow user not found in DB (deleted), logout
    header("Location: logout.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <style>
    body { font-family: Arial, sans-serif; background:#f9f9f9; margin:0; padding:0; }
    .container { max-width:600px; margin:50px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1); }
    nav a { margin-right:15px; text-decoration:none; color:#007bff; }
    h2 { color:#333; }
    .info { margin:20px 0; }
    .info p { font-size:16px; margin:8px 0; }
    .logout { float:right; }
  </style>
</head>
<body>
  <div class="container">
    <nav>
      <a href="dashboard.php">Dashboard</a>
      <a href="logout.php" class="logout">Logout</a>
    </nav>

    <h2>My Profile</h2>
    <div class="info">
      <p><strong>User ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
      <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    </div>
  </div>
</body>
</html>
