<?php
session_start();
include("database.php");

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">NANIR IT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Registration</a>
        </li>
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
          <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
    </div>
  </div>
</nav>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>

    <h3>Registered Users</h3>
    <?php
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table border='1' cellpadding='8'>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Password</th>
                    <th>Registered At</th>
                </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['password'] . "</td>
                    <td>" . $row['reg_date'] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "No users registered yet.";
    }

    mysqli_close($conn);
    ?>
</body>
</html>
