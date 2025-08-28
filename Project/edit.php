<?php
include "db.php";

$id = $_GET["id"] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

$name = $email = $phone = $address = $picture = "";
$errorMessage = $successMessage = "";

// Fetch existing client
$sql = "SELECT * FROM clients WHERE id = ?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$client = $result->fetch_assoc();

if (!$client) {
    die("Client not found!");
}

$name    = $client["name"];
$email   = $client["email"];
$phone   = $client["phone"];
$address = $client["address"];
$picture = $client["picture"];

// Update client on POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = trim($_POST["name"]);
    $email   = trim($_POST["email"]);
    $phone   = trim($_POST["phone"]);
    $address = trim($_POST["address"]);

    // Picture Handling
    $newPicture = $picture; // keep old by default
    if (!empty($_FILES["picture"]["name"])) {
        $targetDir = "uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . time() . "_" . basename($_FILES["picture"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Validate file
        $allowed = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed)) {
            $errorMessage = "❌ Only JPG, JPEG, PNG & GIF files allowed.";
        } elseif ($_FILES["picture"]["size"] > 2 * 1024 * 1024) {
            $errorMessage = "❌ File too large. Max 2MB.";
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFile)) {
                // Delete old picture if exists
                if (!empty($picture) && file_exists($picture)) {
                    unlink($picture);
                }
                $newPicture = $targetFile;
            } else {
                $errorMessage = "❌ Failed to upload picture.";
            }
        }
    }

    if (empty($name) || empty($email) || empty($phone) || empty($address)) {
        $errorMessage = "⚠ All fields are required.";
    } elseif (empty($errorMessage)) {
        // Check duplicate (excluding current client)
        $checkSql = "SELECT id FROM clients WHERE (email = ? OR phone = ?) AND id != ?";
        $checkStmt = $connection->prepare($checkSql);
        $checkStmt->bind_param("ssi", $email, $phone, $id);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $errorMessage = "❌ Another client with this email or phone already exists!";
        } else {
            $sql = "UPDATE clients SET name=?, email=?, phone=?, address=?, picture=? WHERE id=?";
            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sssssi", $name, $email, $phone, $address, $newPicture, $id);

            if ($stmt->execute()) {
                header("Location: index.php?updated=1");
                exit;
            } else {
                $errorMessage = "❌ Update failed: " . $connection->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Client</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <h2 class="fw-bold text-primary mb-4">✏ Edit Client</h2>

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
        <?php if (!empty($picture)) : ?>
          <div class="mb-2">
            <img src="<?php echo $picture; ?>" width="120" class="rounded border">
          </div>
        <?php endif; ?>
        <input type="file" class="form-control" name="picture">
      </div>
    </div>

    <div class="row">
      <div class="offset-sm-3 col-sm-3 d-grid">
        <button type="submit" class="btn btn-primary">Update</button>
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
