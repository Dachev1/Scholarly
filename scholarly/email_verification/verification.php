<?php
require_once '../db/config_session.inc.php';
include '../MAIL\PHPMailer/src/PHPMailer.php';
include '../MAIL\PHPMailer/src/SMTP.php';
include '../MAIL\PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verification</title>
</head>

<body>
    <?php
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    

    try {
        $email = $_GET['email'];
        $username = $_GET['username'];
        //Server settings
        $mail->SMTPDebug = false;
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'aramderandonyan05@pgds.org';                     //SMTP username
        $mail->Password   = 'Aram2005';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('aramderandonyan05@pgds.org', 'Scholarly');
        $mail->addAddress($email, $username);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('../img/dachev.jpg');         //Add attachments
        $mail->addAttachment('../img/aram.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Верификация на имейл';
        $mail->Body    = '<p>Моля цъкнете бутона долу за верификация:</p>
        <a href="http://localhost/scholarly/email_verification/verification_true.php?signup=vrf&email=' . urlencode($email) . '&username=' . urlencode($username) . '"><button>Потвърждение на имейл</button></a>';'';
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        header("Location: ../error_page.php?wait=true");
        // header("Location: ../error_page.php?signup=success");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    ?>
</body>

</html>