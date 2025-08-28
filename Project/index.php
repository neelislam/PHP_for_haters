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
      <a class="btn btn-success shadow-sm" href="/Project/create.php">➕ Create New Client</a>
    </div>

    <div class="card shadow-sm rounded-4">
      <div class="card-body">
        <table class="table table-striped table-hover align-middle text-center">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
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
              $servername = "127.0.0.1";
              $username   = "root";
              $password   = "";
              $database   = "myshop";
              $port       = 4306;

              $connection = new mysqli($servername, $username, $password, $database, $port);

              if($connection->connect_error){
                die("Connection failed: " . $connection->connect_error);
              }

              $sql = "SELECT * FROM clients";
              $result = $connection->query($sql);

              if (!$result){
                die("Invalid query: ". $connection->error);
              }

              while($row = $result->fetch_assoc()){
                echo "
                <tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['address']}</td>
                  <td>{$row['created_at']}</td>
                  <td>
                    <a class='btn btn-sm btn-warning me-1' href='/Project/edit.php?id={$row['id']}'>✏ Edit</a>
                    <a class='btn btn-sm btn-danger' href='/Project/delete.php?id={$row['id']}'>🗑 Delete</a>
                  </td>
                </tr>
                ";
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
