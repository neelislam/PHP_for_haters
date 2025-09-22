<?php
require_once 'functions.php';
if (!is_logged_in()) { header('Location: login.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    // Delete user row (cascades will remove related password_resets & login_history)
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    session_unset();
    session_destroy();
    echo "Account deleted. <a href='register.php'>Register</a>";
    exit;
}
?>
<!doctype html><html><body>
<form method="post">
  <p>Are you sure you want to delete your account? This action is irreversible.</p>
  <button type="submit">Yes, delete my account</button>
  <a href="profile.php">Cancel</a>
</form>
</body></html>
