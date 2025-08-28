<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soseu - Client List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h2 class="fw-bold text-primary">📋 List of Clients</h2>
      <a class="btn btn-success shadow-sm" href="create.php">➕ Create New Client</a>
    </div>

    <!-- Success / Error Alerts -->
    <?php if (isset($_GET["success"])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        ✅ Client added successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET["updated"])): ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        ✏ Client updated successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET["deleted"])): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        🗑 Client deleted successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <!-- Client Table -->
    <div class="card shadow-sm rounded-4">
      <div class="card-body">
        <table class="table table-striped table-hover align-middle text-center">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Picture</th>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Created At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT * FROM clients ORDER BY id DESC";
              $result = $connection->query($sql);

              if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                  $pic = !empty($row['picture']) ? $row['picture'] : "uploads/default.png"; // fallback
                  echo "
                  <tr>
                    <td>{$row['id']}</td>
                    <td><img src='{$pic}' width='50' height='50' class='rounded-circle border'></td>
                    <td>{$row['name']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['address']}</td>
                    <td>{$row['created_at']}</td>
                    <td>
                      <a class='btn btn-sm btn-warning me-1' href='edit.php?id={$row['id']}'>✏ Edit</a>
                      <a class='btn btn-sm btn-danger' href='delete.php?id={$row['id']}'>🗑 Delete</a>
                    </td>
                  </tr>";
                }
              } else {
                echo "<tr><td colspan='8' class='text-muted'>No clients found</td></tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
