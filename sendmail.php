<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->IsHTML(true);

$mail->setFrom('berk.keytret@gmail.com', 'site: filters');

$mail->addAddress('yakymivyura@gmail.com');

$mail->Subject = 'Лист з сайту FILTERS';


$body = '<h1>Крутий лист з сайту "Filters"!</h1>';

// if (trim(!empty($_POST['name']))){
//   $body .= '<p><strong>Ім"я:</strong> '.$_POST['name'].' </p>';
// }
// if (trim(!empty($_POST['email']))){
//   $body .= '<p><strong>E-mail</strong> '.$_POST['email'].' </p>';
// }
// if (trim(!empty($_POST['message']))){
//   $body .= '<p><strong>Повідомлення:</strong> '.$_POST['message'].' </p>';
// }

$mail->Body = $body;

if (!$mail->send()){
  $message = 'ERROR';
} else {
  $message = 'Everything is sent!';
}

$response = [$message];

header('Content-type: application/json');
echo json_encode($response);

?>