<?php
// config.php

date_default_timezone_set('Asia/Dhaka'); // your timezone

// Database settings
define('DB_HOST', '127.0.0.1:3306'); 
define('DB_NAME', 'user_management');
define('DB_USER', 'root');
define('DB_PASS', '');

// Project base URL
define('BASE_URL', 'http://localhost/PHP_for_haters/Final_Project/userapp/');

// SMTP settings for PHPMailer
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_USER', 'rabiul18.ri@gmail.com');   // Gmail account used for SMTP
define('SMTP_PASS', 'gpkhzoqjfyxswyli');        // Gmail App Password (no spaces!)
define('SMTP_PORT', 587);
define('MAIL_FROM', 'rabiul18.ri@gmail.com');   // must match SMTP_USER
define('MAIL_FROM_NAME', 'UserApp');

// PDO connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
        DB_USER,
        DB_PASS,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
