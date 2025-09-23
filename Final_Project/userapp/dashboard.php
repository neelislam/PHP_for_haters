<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <style>
    body { font-family: Arial, sans-serif; background:#f9f9f9; margin:0; padding:0; }
    .container { max-width:800px; margin:50px auto; background:#fff; padding:20px; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1); }
    nav a { margin-right:15px; text-decoration:none; color:#007bff; }
    h2 { color:#333; }
    form { margin:20px 0; }
    label { display:block; margin-top:10px; }
    input { width:100%; padding:10px; margin-top:5px; border:1px solid #ccc; border-radius:5px; }
    button { margin-top:15px; padding:10px 15px; background:#007bff; border:none; color:#fff; border-radius:5px; cursor:pointer; }
    button:hover { background:#0056b3; }
    .logout { float:right; }
  </style>
</head>
<body>
  <div class="container">
    <nav>
      <span>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</span>
      <a href="profile.php">Profile</a>

      <a href="logout.php" class="logout">Logout</a>
    </nav>

    <h2>Dashboard</h2>

    <h3>Update Name</h3>
    <form method="post" action="update_name.php">
      <label>New Name</label>
      <input type="text" name="full_name" required>
      <button type="submit">Update Name</button>
    </form>

    <h3>Update Email</h3>
    <form method="post" action="update_email.php">
      <label>New Email</label>
      <input type="email" name="email" required>
      <button type="submit">Update Email</button>
    </form>

    <h3>Update Password</h3>
    <form method="post" action="update_password.php">
      <label>Current Password</label>
      <input type="password" name="current_password" required>
      <label>New Password</label>
      <input type="password" name="new_password" required>
      <label>Confirm Password</label>
      <input type="password" name="confirm_password" required>
      <button type="submit">Update Password</button>
    </form>
  </div>
</body>
</html>
