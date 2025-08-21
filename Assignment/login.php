<?php 
$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="contai">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
            
                        <div class="card-header">
                        <h5>Login Form</h5>
                        </div>
                        <div class="card-bod">
                            <form action="">
                                <div class="form-group mb-3">
                                    <label for="">Email Adress</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Password</label>
                                    <input type="text" name="password" class="form-control">
                                </div>
                               
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Login Now</button>
                                </div>
                            </form>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>