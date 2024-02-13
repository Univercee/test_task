<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EmailManager {
    static function sendMail(string $sendTo, string $filename){
        // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);
        $env = parse_ini_file('.env');
        try {
            // Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = $env["GOOGLE_SMTP_EMAIL"]; // YOUR gmail email
            $mail->Password = $env["GOOGLE_SMTP_PASSWORD"]; // YOUR gmail password

            // Sender and recipient settings
            $mail->setFrom($env["GOOGLE_SMTP_EMAIL"]);
            $mail->addAddress($sendTo);
            $mail->addAttachment(FileManager::getPath().$filename);

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = "Send email using Gmail SMTP and PHPMailer";
            $mail->Body = 'HTML message body. <b>Gmail</b> SMTP email body.';
            $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

            $mail->send();
            return true;
        } catch (Exception $e) {
            throw new Exception($e);
        }
    }
}
?>