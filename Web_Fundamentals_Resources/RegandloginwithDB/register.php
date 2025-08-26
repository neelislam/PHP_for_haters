<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
    <style>
        form{
            box-shadow: 0 10px 10px 0;
            border-radius: 6px;
            padding: 40px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row  mt-5">
            <div class="col-sm-12 col-lg-4 col-md-6 offset-lg-4">
                <form action="insert.php" method="post"> 
                <div class="mb-3">
                        <h4 class="text-center">Register Here</h4>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="E-mail" name="email">
                    </div>
                    <div class="mb-3">
                        <input type="tel" class="form-control" placeholder="Phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="pass">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpass">
                    </div>
                    <button type="submit" class="btn btn-primary col-12" name="register">Register</button>
                    <h4>Already registered?</h4>
                    <a href="login.php"><input type="button" value="Login" class="btn btn-secondary"></a>
                </form>
            </div>
        </div>
    </div>

















    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>