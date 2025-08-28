<?php
include "db.php";

$name = $email = $phone = $address = $picture = "";
$errorMessage = $successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = trim($_POST["name"]);
    $email   = trim($_POST["email"]);
    $phone   = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    // Handle Picture Upload
    if (!empty($_FILES["picture"]["name"])) {
        $targetDir = "uploads/";
        $fileName = time() . "_" . basename($_FILES["picture"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ["jpg","jpeg","png","gif"];
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)) {
                $picture = $targetFilePath;
            } else {
                $errorMessage = "❌ Error uploading picture.";
            }
        } else {
            $errorMessage = "⚠ Only JPG, JPEG, PNG, GIF allowed.";
        }
    }

    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = "⚠ All fields are required.";
    } elseif (empty($errorMessage)) {
        // Check duplicate
        $checkSql = "SELECT id FROM clients WHERE email = ? OR phone = ?";
        $checkStmt = $connection->prepare($checkSql);
        $checkStmt->bind_param("ss", $email, $phone);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $errorMessage = "❌ Client with this email or phone already exists!";
        } else {
            // Insert new client
            $sql = "INSERT INTO clients (name, email, phone, address, picture) VALUES (?, ?, ?, ?, ?)";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sssss", $name, $email, $phone, $address, $picture);

            if ($stmt->execute()) {
                header("Location: index.php?success=1");
                exit;
            } else {
                $errorMessage = "❌ Error: " . $connection->error;
            }
        }
        $checkStmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Client</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <h2 class="fw-bold text-primary mb-4">➕ Add New Client</h2>

  <?php if (!empty($errorMessage)) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong><?php echo $errorMessage; ?></strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label">Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($name); ?>">
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label">Email</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>">
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label">Phone</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label">Address</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($address); ?>">
      </div>
    </div>

    <div class="mb-3 row">
      <label class="col-sm-3 col-form-label">Picture</label>
      <div class="col-sm-6">
        <input type="file" class="form-control" name="picture">
      </div>
    </div>

    <div class="row">
      <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      <div class="col-sm-3 d-grid">
        <a class="btn btn-outline-primary" href="index.php" role="button">Cancel</a>
      </div>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
