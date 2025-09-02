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
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
    <a href="logout.php">Logout</a>
    <hr>

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
