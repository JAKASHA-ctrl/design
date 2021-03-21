<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require("phpmailer\src\PHPMailer.php");
require("phpmailer\src\Exception.php");
require("phpmailer\src\SMTP.php");


$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = '*********';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '**********';                     //SMTP username
    $mail->Password   = '*************';                               //SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('********************', 'site: filters');
    $mail->addAddress('********************', 'Joe User');     //Add a recipient


    //Content
    $mail->isHTML(true);                            //Set email format to HTML
    $mail->CharSet = 'UTF-8';                                  
    $mail->Subject = 'Лист з сайту FILTERS';


    $body = '<h1>Крутий лист з сайту "Filters"!</h1>';

    if (trim(!empty($_POST['name']))){
      $body .= '<p><strong>Ім"я:</strong> '.$_POST['name'].' </p>';
    }
    if (trim(!empty($_POST['email']))){
      $body .= '<p><strong>E-mail</strong> '.$_POST['email'].' </p>';
    }
    if (trim(!empty($_POST['message']))){
      $body .= '<p><strong>Повідомлення:</strong> '.$_POST['message'].' </p>';
    }

    $mail->Body = $body;

    $mail->SMTPOptions = array(
                      'ssl' => array(
                          'verify_peer' => false,
                          'verify_peer_name' => false,
                          'allow_self_signed' => true
                      )
                  );


    // if (!$mail->send()){
    //   $message = 'ERROR';
    // } else {
    //   $message = ;
    // }

    
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

$response = [ 'result' => 'Everything is sent!'];
header('Content-Type: application/json');
echo json_encode($response);

?>