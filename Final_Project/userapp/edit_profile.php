<?php
require_once 'functions.php';
if (!is_logged_in()) { header('Location: login.php'); exit; }
$user = current_user();
?>
<!doctype html><html><head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<div class="container py-4">
  <a href="profile.php">&larr; Back to profile</a>
  <div class="card mt-2">
    <div class="card-body">
      <form method="post" action="update_profile.php">
        <div class="mb-3">
          <label>Full Name</label>
          <input name="full_name" class="form-control" value="<?php echo htmlspecialchars($user['full_name']); ?>">
        </div>
        <div class="mb-3">
          <label>Bio</label>
          <textarea name="bio" class="form-control"><?php echo htmlspecialchars($user['bio']); ?></textarea>
        </div>
        <hr>
        <h5>Change Password</h5>
        <div class="mb-3">
          <label>New Password (leave blank to keep current)</label>
          <input name="new_password" type="password" class="form-control">
        </div>
        <div class="d-flex gap-2">
          <button class="btn btn-success">Save</button>
          <a href="profile.php" class="btn btn-outline-secondary">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body></html>
