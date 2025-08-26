<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soseu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="Container my-5">
        <h2>List of client</h2>
        <a class="btn btn-primary" href="/Project/create.php">Create New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
        </table>
        <tbody>
            <tr>
                <td>10</td>
                <td>John Doe</td>
                <td>bill.gates@microsoft.com</td>
                <td>+1 123 456 7890</td>
                <td>1234 Elm St, Springfield, IL</td>
                <td>18/05/2022</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/Project/edit.php">Edit</a>
                    <a class="btn btn-danger btn-sm" href="/Project/delete.php">Delete</a>
            </tr>
        </tbody>

    </div>
</body>
</html>