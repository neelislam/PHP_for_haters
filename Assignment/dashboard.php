<?php 
session_start();
if(!isset($_SESSION['auth'])){
    $_SESSION['status'] = "Please login first!";
    header("Location: login.php");
    exit();
}

$page_title = "Dashboard";
include('includes/header.php');
include('includes/navbar.php');

function visitCount(){
    static $count = 0; // static variable
    $count++;
    return $count;
}

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="card-header"><h4>User Dashboard</h4></div>
                    <div class="card-body">
                        <h2>Welcome, <?php echo $_SESSION['auth_user']['name']; ?> 👋</h2>
                        <h4>Email: <?php echo $_SESSION['auth_user']['email']; ?></h4>
                        <p>Phone: <?php echo $_SESSION['auth_user']['phone']; ?></p>

                        <p>You have visited this page <b><?php echo visitCount(); ?></b> times in this session.</p>

                        <a href="logout.php" class="btn btn-danger">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
