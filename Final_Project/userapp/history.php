<?php
require_once 'functions.php';
if (!is_logged_in()) { header('Location: login.php'); exit; }
$user = current_user();

$stmt = $pdo->prepare("SELECT ip_address, user_agent, created_at FROM login_history WHERE user_id = ? ORDER BY created_at DESC LIMIT 50");
$stmt->execute([$user['id']]);
$rows = $stmt->fetchAll();
?>
<!doctype html><html><head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login History</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head><body>
<div class="container py-4">
  <a href="profile.php">&larr; Back</a>
  <h3>Login history</h3>
  <table class="table">
    <thead><tr><th>When</th><th>IP</th><th>User agent</th></tr></thead>
    <tbody>
      <?php foreach($rows as $r): ?>
        <tr>
          <td><?php echo $r['created_at']; ?></td>
          <td><?php echo htmlspecialchars($r['ip_address']); ?></td>
          <td><?php echo htmlspecialchars($r['user_agent']); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body></html>
