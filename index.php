<?php

include("includes/config.php");
include("vendor/autoload.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
 
    $mail->isSMTP();                                            
    $mail->Host       = SMTP_HOST;                     
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = SMTP_USER;                    
    $mail->Password   = SMTP_PASS;                                     
    $mail->Port       = SMTP_PORT ;                                   
     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('atendimento@sauloreciclaveis.com', 'Andre');
    $mail->addAddress('atendimento@sauloreciclaveis.com', 'Atendimento Saulo Reciclaveis');     //Add a recipient
   

     //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';


    $mail->send();
    echo 'Email enviado com sucesso';
} catch (Exception $e) {
    echo " Error: {$mail->ErrorInfo}";
}