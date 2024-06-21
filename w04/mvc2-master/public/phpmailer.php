<?php

//Load Composer's autoloader
require '../vendor/autoload.php';

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'phpmaster@internet.ru';                 // SMTP username
    $mail->Password = '6wkKM5Br1AgqyDxmctWv';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('phpmaster@internet.ru', 'PHP master');
    $mail->addAddress('dphpmaster@internet.ru', 'PHP master');     // Add a recipient
    $mail->addReplyTo('lphpmaster@internet.ru', 'Information');
    $mail->addCC('phpmaster@internet.ru');
    $mail->addBCC('phpmaster@internet.ru');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $ret = $mail->send();
    echo 'Message send result:<br>';
    var_dump($ret);
} catch (Exception $e) {
    echo '<pre>' . print_r($e->getTrace(), 1);
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}