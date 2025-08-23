<?php 
session_start();
$page_title = "Login Form";
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(isset($_SESSION['status'])): ?> 
                    <div class="alert alert-info"><?php echo $_SESSION['status']; unset($_SESSION['status']); ?></div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-header"><h5>Login Form</h5></div>
                    <div class="card-body">
                        <form action="login_code.php" method="POST">
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <button type="submit" name="login_btn" class="btn btn-primary">Login Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
