<?php
include('config.php');

$msg = '';
if(isset($_GET['msg'])){
    $msf = htmlspecialchars($_GET['msg']);
}




$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>CRUD - Users</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
  <h1>Pending Orders: </h1>
  <?php if ($msg): ?>
    <div class="alert alert-success"><?php echo $msg; ?></div>
  <?php endif; ?>
  <p><a href="create.php" class="btn btn-primary">Make Order</a></p>

  <table class="table table-striped">
    <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Address</th><th>Product</th><th>Created</th><th>Actions</th></tr></thead>
    <tbody>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td><?php echo htmlspecialchars($row['address']); ?></td>
        <td><?php echo htmlspecialchars($row['product']); ?></td>
        <td><?php echo $row['order_time']; ?></td>
        <td>
          <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>

          <!-- Delete via POST form (safer than GET) -->
          <form method="post" action="delete.php" style="display:inline" onsubmit="return confirm('Delete this user?');">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <button class="btn btn-sm btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
    <?php endwhile; ?>
    </tbody>
  </table>
</div>
</body>
</html>
</html>