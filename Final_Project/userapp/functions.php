<?php
// functions.php
require_once __DIR__ . '/config.php';

// If you will use PHPMailer (recommended), ensure Composer autoload is available:
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
} else {
    // If vendor not present, you can still use PHP mail() as a fallback (less reliable)
}

/**
 * Send email using PHPMailer (preferred).
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

            $mail->SMTPDebug = 2; // ⚡ show detailed debug info
            $mail->Debugoutput = 'html';

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo; // ⚡ show error
            return false;
        }
    } else {
        // fallback
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: " . MAIL_FROM_NAME . " <" . MAIL_FROM . ">\r\n";
        return mail($to, $subject, $bodyHtml, $headers);
    }
}


/**
 * Simple helper to check login
 */
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

/**
 * Get current user data (returns assoc or null)
 */
function current_user() {
    global $pdo;
    if (!is_logged_in()) return null;
    $stmt = $pdo->prepare("SELECT id, full_name, email, bio, is_verified, created_at, last_login FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch();
}

/**
 * Simple flash messaging
 */
function flash($key, $message = null) {
    if ($message === null) {
        if (!empty($_SESSION['flash'][$key])) {
            $m = $_SESSION['flash'][$key];
            unset($_SESSION['flash'][$key]);
            return $m;
        }
        return null;
    } else {
        $_SESSION['flash'][$key] = $message;
    }
}
