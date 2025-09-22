<?php require_once 'functions.php'; ?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Password reset</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<div class="container py-4">
  <h3>Reset password</h3>
  <form method="post" action="password_reset_action.php">
    <div class="mb-3">
      <label>Email</label>
      <input name="email" type="email" class="form-control" required>
    </div>
    <button class="btn btn-primary">Send reset link</button>
  </form>
</div>
</body></html>
