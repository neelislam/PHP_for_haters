<?php
require_once 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);

    global $pdo;
    $stmt = $pdo->prepare("SELECT id, full_name FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(16));
        $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Insert token into DB
        $stmt = $pdo->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)");
        $stmt->execute([$user['id'], $token, $expires]);

        // Prepare pretty email
        $resetLink = BASE_URL . "reset_password.php?token={$token}";
        $subject = "Password Reset for UserApp";
        $body = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Password Reset</title>
        <style>
          body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin:0; padding:0; }
          .container { max-width: 600px; margin:40px auto; background:#fff; padding:30px; border-radius:10px; box-shadow:0 0 15px rgba(0,0,0,0.1); }
          h2 { color:#333; }
          p { color:#555; line-height:1.5; }
          a.button { display:inline-block; padding:12px 20px; margin:20px 0; background-color:#007bff; color:#fff; text-decoration:none; border-radius:5px; }
          a.button:hover { background-color:#0056b3; }
          .footer { font-size:12px; color:#999; margin-top:20px; }
        </style>
        </head>
        <body>
          <div class='container'>
            <h2>Password Reset Request</h2>
            <p>Hello " . htmlspecialchars($user['full_name']) . ",</p>
            <p>We received a request to reset your password. Click the button below (valid 1 hour):</p>
            <a href='{$resetLink}' class='button'>Reset Password</a>
            <p>If you didn't request this, you can safely ignore this email.</p>
            <div class='footer'>UserApp &copy; 2025</div>
          </div>
        </body>
        </html>
        ";

        send_email($email, $subject, $body);
    }

    flash('success', 'If the account exists, a reset link has been sent to the email.');
    header('Location: password_reset_request.php');
    exit;
}
