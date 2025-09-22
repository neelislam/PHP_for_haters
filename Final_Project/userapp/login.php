<?php
require_once 'functions.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login - UserApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body { background: #f8f9fa; }
      .card { border-radius: 15px; box-shadow: 0 8px 20px rgba(0,0,0,0.15); }
      .btn-primary { width: 100%; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center align-items-center" style="min-height:80vh;">
    <div class="col-md-5">
      <div class="card p-4">
        <div class="card-body">
          <?php if ($msg = flash('error')): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($msg); ?></div>
          <?php endif; ?>

          <h3 class="mb-4 text-center">Login to UserApp</h3>
          <form action="login_action.php" method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input id="email" name="email" type="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input id="password" name="password" type="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-3">
              <a href="password_reset_request.php">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
          </form>

          <hr>
          <p class="text-center mt-3">
              Don't have an account? <a href="register.php">Register here</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
