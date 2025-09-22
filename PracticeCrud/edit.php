<?php
require 'config.php';

// Correct check: if no id → redirect
if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = (int)$_GET['id'];

// Fetch existing record
$sql = "SELECT id, name, email, address, product FROM users WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);

if (!$row) {
    header('Location: index.php?msg=' . urlencode('Not found'));
    exit;
}

$name    = $row['name'];
$email   = $row['email'];
$address = $row['address'];
$product = $row['product'];
$error   = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $product = trim($_POST['product'] ?? '');

    if ($name === '' || $email === '' || $address === '' || $product === '') {
        $error = 'All fields are required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address.';
    } else {
        $sql = "UPDATE users SET name = ?, email = ?, address = ?, product = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssi', $name, $email, $address, $product, $id);
        mysqli_stmt_execute($stmt);

        header('Location: index.php?msg=' . urlencode('User updated'));
        exit;
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Edit user</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h1>Update Order</h1>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
  <?php endif; ?>

  <form method="post">
    <div class="mb-3">
      <label>Name</label>
      <input name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>">
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>">
    </div>
    <div class="mb-3">
      <label>Address</label>
      <input name="address" class="form-control" value="<?php echo htmlspecialchars($address); ?>">
    </div>
    <div class="mb-3">
      <label>Product</label>
      <input name="product" class="form-control" value="<?php echo htmlspecialchars($product); ?>">
    </div>
    <button class="btn btn-primary" type="submit">Save</button>
    <a href="index.php" class="btn btn-secondary">Cancel</a>
  </form>
</div>
</body>
</html>
