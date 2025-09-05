<?php
require 'config.php';

$name = $email = $address = $product = $error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $product = trim($_POST['product'] ?? '');

    if ($name === '' || $email === '') {
        $error = "Name and email address required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid Email.';
    } else {
        $sql = "INSERT INTO users (name, email, address, product) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        // 4 placeholders → 4 variables → "ssss"
        mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $address, $product);

        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            header('Location: index.php?msg=' . urlencode('Order placed successfully'));
            exit;
        } else {
            $error = 'Insert failed: ' . mysqli_error($conn);
        }
    }
}
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Create user</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h1>Place Order</h1>
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
    <button class="btn btn-primary" type="submit">Place Order</button>
    <a href="index.php" class="btn btn-secondary">Back</a>
  </form>
</div>
</body>
</html>
