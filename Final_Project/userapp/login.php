<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - UserApp</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h3 class="mb-3">Login</h3>

          <!-- Popup alert -->
          <?php if ($msg = flash('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <?php echo htmlspecialchars($msg); ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif; ?>

          <form action="login_action.php" method="POST">
  <div class="mb-3">
    <label>Email</label>
    <input name="email" type="email" class="form-control" required>
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input name="password" type="password" class="form-control" required>
  </div>

  <div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-primary">Login</button>
    <a href="password_reset_request.php">Forgot password?</a>
  </div>
</form>


          <hr>
          <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
