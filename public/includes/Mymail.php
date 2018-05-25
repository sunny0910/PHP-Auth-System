<?php
namespace php\includes;

use PHPMailer;
use views\passwordmail;

class Mymail
{
    public function mailsender($email, $pass, $body)
    {
        $pass;
        $mail = new PHPMailer;
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = '*****@gmail.com';                 // SMTP username
        $mail->Password = '******';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->setFrom('kushal6262@gmail.com', 'Mailer');
        $mail->addAddress($email);    // Add a recipient
        // $mail->addAddress('kushal6262@gmail.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Hey there.';
        $mail->Body    =  $body;
        if (!$mail->send()) {
        }
    }
}
