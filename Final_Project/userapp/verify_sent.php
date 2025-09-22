<?php
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Check Your Email - UserApp</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      body { background-color: #f8f9fa; }
      .card {
          border-radius: 15px;
          box-shadow: 0 8px 20px rgba(0,0,0,0.15);
      }
      .btn-primary { width: 100%; }
  </style>
</head>
<body>
<div class="container py-5">
  <div class="row justify-content-center align-items-center" style="min-height:80vh;">
    <div class="col-md-6">
      <div class="card text-center p-4">
        <div class="card-body">
          <h3 class="mb-4">Registration Successful!</h3>
          <p class="lead">We’ve sent a verification email to your inbox. Please check your email and click the verification link to activate your account.</p>
          <div class="mt-4">
            <a href="login.php" class="btn btn-primary">Go to Login</a>
          </div>
          <p class="mt-3 text-muted">Didn't receive the email? Check your spam folder or <a href="resend_verification.php">resend verification email</a>.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
