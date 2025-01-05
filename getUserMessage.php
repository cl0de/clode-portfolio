<?php
header("content-type: application/JSON; charset=UTF-8");
$executionStartTime = microtime(true);

//Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


//$name = $email = $message = "";

// Input value sanitization

function sanitize_Input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
 }
//$name = trim($_POST['name']);
//echo $name;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $validation_error = [];
    $result = [];
  if(isset($_POST['name'])) $name = sanitize_input($_POST['name']);
  else $validation_error['name'] = 'Required';
  if (isset($_POST['email'])) $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  else $validation_error['email'] = 'Required';
  if (isset($_POST['message'])) $message = sanitize_input($_POST['message']);
  else $validation_error['message'] = 'Required';

  if (!empty($validation_error)) {
      $result['success'] = false;
      $result['errors'] = $validation_error;
  } else {
      $result['success'] = true;
      $result['message'] = 'Validated input values!';
  }
//print_r($result);



require 'vendor/autoload.php';

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//function sendMail($name, $email, $message)
//{

//Create a new PHPMailer instance
$mail = new PHPMailer(true);
//print_r($mail);

// try {
// Server setting

//Enable SMTP debugging
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
//Whether to use SMTP authentication
$mail->isSMTP();
$mail->SMTPAuth = true;
//Set the hostname and the SMTP port number of the mail server
//Set the encryption mechanism to use:
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
//Username and Password to use for SMTP authentication - use full email address for gmail
$mail->Username = 'uwaclode@gmail.com';
$mail->Password = 'xyrc pivr gury jamv';

// Recipient

//Set who the message is to be sent from - 
//Do not use user-submitted addresses in here
$mail->setFrom('info@clodeuwamariya.com', 'Portfolio');
//Set an alternative reply-to address
//This is a good place to put user-submitted addresses
$mail->addReplyTo($email, $name);
//Set who the message is to be sent to
$mail->addAddress('uwaclode@gmail.com', 'Clode');

// Content

//Set email format to HTML
$mail->isHTML(true);
//Set the subject line and the message body
$mail->Subject = 'You have a mail!- Portfolio form';
$mail->Body = '<h3>New inquiry</h3>'. $message ;
//send the message, check for errors
if (!$mail->send()) {
    $result['success'] = false;
    $result['message'] =
    'Message could not be sent. Mailer Error:' . $mail->ErrorInfo;
      // echo 'Message has been sent by ' . $name . ' the message is:' . $message;
    //echo 'Message could not be sent. Mailer Error:' . $mail->ErrorInfo;
} else {
    $result['success'] = true;
    $result['message'] = 'Thank you ' . $name . ', your message has been sent!';
        // echo 'Message could not be sent. Mailer Error:' . $mail->ErrorInfo;
    //echo 'Message has been sent by ' . $name . ' the message is:' . $message; 
}
//$decode = json_decode($result);

  //  $response['data'] = 'Success validation';


  // } catch (Exception $err) {
  //   echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo)';
  // }
  //     // $result['message'] = 'Required input value Validated';
  // }
  //}
  //echo $name;
  //echo $email;

  // $response['status']['code'] = "200";
  // $response['status']['name'] = "ok";
  // $response['status']['description'] = "success";
  // $response['status']['returnedIn'] = intval((microtime(true) - $executionStartTime) * 1000) . " ms";
  //var_dump($decode);
  $response['data'] = $result;
 // print_r($response);
 // var_dump($result);
  //header('Content-Type: application/json; charset=UTF-8');
  //echo($response);
  echo json_encode($response);

}
// }











// if(isset($_REQUEST['name']) && isset($_REQUEST['email'])) {

//     $from = $_REQUEST['email'];
//     $message = $_REQUEST['message'];

//     $header = "From:".$from;

//     if(mail('someaddress@example.com', 'Contact me', $message. $header)) {
//         echo '<div class="alert alert-success">Email has been sent successfully</div>';
//     }
// }

// SMTP configuration

// define('MAILHOST', "smtp.gmail.com");
// define('USERNAME', "uwaclode@gmail");
// define('PASSWORD', "xyrc pivr gury jamv");
// define('SEND_FROM', $user_email);
// define('SEND_FROM_NAME', $user_name);