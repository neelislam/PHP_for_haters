<?php
require_once 'functions.php';
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register - UserApp</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<?php if ($msg = flash('error')): ?>
  <div class="alert alert-danger"><?php echo htmlspecialchars($msg); ?></div>
<?php endif; ?>
<div class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h3 class="card-title mb-3">Create an account</h3>
          <form id="registerForm" method="post" action="register_action.php" novalidate>
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input name="full_name" id="full_name" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input name="email" id="email" type="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input name="password" id="password" type="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input name="confirm_password" id="confirm_password" type="password" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <button class="btn btn-primary" type="submit">Register</button>
              <a href="login.php">Have an account? Login</a>
            </div>
          </form>
        </div>
      </div>
      <div class="text-center mt-3">
        <button id="toggleTheme" class="btn btn-sm btn-outline-secondary">Toggle Dark/Light</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script>
document.getElementById('registerForm').addEventListener('submit', function(e){
  const name = document.getElementById('full_name').value.trim();
  const email = document.getElementById('email').value.trim();
  const pw = document.getElementById('password').value;
  const cpw = document.getElementById('confirm_password').value;
  if(!name || !email || !pw || !cpw) {
    alert('Please fill all fields.');
    e.preventDefault();
    return;
  }
  if(pw.length < 8) {
    alert('Password must be at least 8 characters.');
    e.preventDefault();
    return;
  }
  if(pw !== cpw) {
    alert('Passwords do not match.');
    e.preventDefault();
    return;
  }
  // allow submit
});
</script>
</body>
</html>
