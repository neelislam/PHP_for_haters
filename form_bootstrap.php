<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap PHP Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">

    <h2>Login Form</h2>
    <form method="POST" action="home_two.php">
        <div class="mb-3">
            <input type="email" class="form-control" placeholder="email" name="user" required>
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" placeholder="password" name="password">
        </div>
       
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>