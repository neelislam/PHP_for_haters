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
        form {
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
                <form action="insert.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <h4 class="text-center text-danger">CRUD OPERATION</h4>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="fw-bold text-warning">Product Name:</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="fw-bold text-warning">Product Price:</label>
                        <input type="number" class="form-control" name="price">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="fw-bold text-warning">Product Image:</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                    <button type="submit" class="btn btn-danger col-12" name="add">Add</button>
                </form>
            </div>
        </div>
    </div>

    <!-- display content -->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "connect.php";
                        $alldata = mysqli_query($connect, "SELECT * FROM `crud`");
                        while ($arr = mysqli_fetch_array($alldata)) {
                            echo
                            "<tr>
                    <td>$arr[id]</td>
                    <td>$arr[name]</td>
                    <td>$arr[price]</td>
                    <td><img src='$arr[image]' alt='image' width='100px'></td>
                    <td><a class='btn btn-danger' href='delete.php?id=$arr[id]' name='id'>Delete</a></td>
                     <td><a class='btn btn-warning' href='update.php?id=$arr[id]' name='id'>Update</a></td>
                   </tr>";
                        }
                        ?>
                    </tbody>
                </table>
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