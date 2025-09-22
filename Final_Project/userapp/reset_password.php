<?php
require_once 'functions.php';
$token = $_GET['token'] ?? '';
if (!$token) { echo "Invalid link"; exit; }

$stmt = $pdo->prepare("SELECT pr.id, pr.user_id, pr.expires_at, u.email FROM password_resets pr JOIN users u ON pr.user_id = u.id WHERE pr.token = ?");
$stmt->execute([$token]);
$rec = $stmt->fetch();
if (!$rec || strtotime($rec['expires_at']) < time()) {
    echo "Token invalid or expired."; exit;
}
?>
<!doctype html><html><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Reset password</title>
</head><body>
<div class="container py-4">
  <h3>Set new password</h3>
  <form method="post" action="reset_password_action.php">
    <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
    <div class="mb-3">
      <label>New password</label>
      <input name="password" type="password" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Confirm</label>
      <input name="confirm_password" type="password" class="form-control" required>
    </div>
    <button class="btn btn-primary">Change password</button>
  </form>
</div>
</body></html>
