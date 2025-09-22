<?php
require_once 'functions.php';
if (!is_logged_in()) {
    header('Location: login.php'); exit;
}
$user = current_user();
?>
<!doctype html>
<html><head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Profile - UserApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head><body>
<div class="container py-4">
  <div class="d-flex justify-content-between">
    <h2>Welcome, <?php echo htmlspecialchars($user['full_name']); ?></h2>
    <div>
      <a href="history.php" class="btn btn-sm btn-outline-primary">Login History</a>
      <a href="logout.php" class="btn btn-sm btn-outline-secondary">Logout</a>
    </div>
  </div>
  <div class="card mt-3">
    <div class="card-body">
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
      <p><strong>Bio:</strong> <?php echo nl2br(htmlspecialchars($user['bio'])); ?></p>
      <p><strong>Joined:</strong> <?php echo $user['created_at']; ?></p>
      <p><strong>Last login:</strong> <?php echo $user['last_login']; ?></p>

      <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
      <a href="delete_account.php" class="btn btn-danger" onclick="return confirm('Delete account? This cannot be undone.');">Delete Account</a>
    </div>
  </div>
</div>

<script src="assets/js/main.js"></script>
</body></html>
