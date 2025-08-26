<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <style>
          form{
              background : #fff;
              padding: 15px;
              box-shadow:0px 0px 10px 0px #000;
              border-radius: 10px;

          }
     </style>
    <title>login</title>
  </head>
  <body>
    
    <div class="container-fluid">
            <div class="row justify-content-center mt-5">
               <div class="col-lg-4 col-md-6 col-sm-12">
               <form action="home.php" method="post">
               <div class="mb-3">
                      <h3 class="text-center">Login</h3>
            </div>
            <div class="mb-3">
             <input type="text" class="form-control" name="l_username" placeholder="username" required>
            </div>
            <div class="mb-3">
            <input type="password" class="form-control" name="l_pass"  placeholder="password" required>
            </div>
            <input type="submit" class="btn btn-primary col-12 " class="form-control" name="login" value="login"><br><br>
        
             </form>
               </div>
            </div>  
     
     </div>        
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>