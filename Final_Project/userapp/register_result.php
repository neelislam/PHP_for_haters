<?php
require_once 'functions.php';
session_start();

// Get flash messages
$success = flash('success');
$error = flash('error');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration Result - UserApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body { background-color: #f8f9fa; }
      .card { border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
      .btn-primary { width: 100%; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center align-items-center" style="min-height:80vh;">
    <div class="col-md-6">
      <div class="card text-center p-4">
        <div class="card-body">
          <?php if ($success): ?>
              <h3 class="text-success mb-3">🎉 Success!</h3>
              <p class="lead"><?php echo htmlspecialchars($success); ?></p>
              <a href="login.php" class="btn btn-primary mt-3">Go to Login</a>
          <?php elseif ($error): ?>
              <h3 class="text-danger mb-3">⚠️ Error!</h3>
              <p class="lead"><?php echo htmlspecialchars($error); ?></p>
              <a href="register.php" class="btn btn-primary mt-3">Back to Register</a>
          <?php else: ?>
              <p class="lead">No message available.</p>
              <a href="register.php" class="btn btn-primary mt-3">Back to Register</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
