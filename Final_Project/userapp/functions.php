<?php
// functions.php
session_start(); // start session for flash messages and login

require_once __DIR__ . '/config.php'; // include your DB & constants

// Composer autoload for PHPMailer
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

/**
 * Send email using PHPMailer
 *
 * @param string $to
 * @param string $subject
 * @param string $bodyHtml
 * @param string $bodyPlain
 * @return bool
 */
function send_email($to, $subject, $bodyHtml, $bodyPlain = '') {
    if (class_exists('PHPMailer\PHPMailer\PHPMailer')) {
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->SMTPAuth = true;
            $mail->Username = SMTP_USER;
            $mail->Password = SMTP_PASS;
            $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = SMTP_PORT;

            $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
            $mail->addAddress($to);
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $bodyHtml;
            $mail->AltBody = $bodyPlain ?: strip_tags($bodyHtml);

            return $mail->send();
        } catch (PHPMailer\PHPMailer\Exception $e) {
            flash('error', "Mailer Error: " . $mail->ErrorInfo);
            return false;
        }
    } else {
        // fallback to PHP mail()
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM . ">\r\n";
        return mail($to, $subject, $bodyHtml, $headers);
    }
}

/**
 * Flash messaging helper
 *
 * Usage:
 * flash('key', 'message'); // set
 * $msg = flash('key'); // get & remove
 */
function flash($key, $message = null) {
    if (!isset($_SESSION['flash'])) {
        $_SESSION['flash'] = [];
    }

    if ($message === null) {
        if (!empty($_SESSION['flash'][$key])) {
            $msg = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $msg;
        }
        return null;
    } else {
        $_SESSION['flash'][$key] = $message;
    }
}

/**
 * Check if user is logged in
 *
 * @return bool
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Get current logged-in user data
 *
 * @return array|null
 */
function current_user() {
    global $pdo;
    if (!is_logged_in()) return null;

    $stmt = $pdo->prepare("SELECT id, full_name, email, is_verified, created_at FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Redirect helper
 */
function redirect($url) {
    header("Location: $url");
    exit;
}
