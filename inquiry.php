
<?php
require('PHPMailer.php');
require('SMTP.php');

session_start();

$emailadd= $_POST['emailadd'];
$telnum = $_POST['telnum'];
$inquiry = $_POST['inq_message'];
$email = 'cprosperoso@yahoo.com';

     $mail = new PHPMailer\PHPMailer\PHPMailer;
     try{
     $mail->isSMTP();
     $mail->SMTPDebug = 0;
     $mail->Host = "smtp.gmail.com";
     $mail->Port = 587;
     $mail->SMTPSecure = 'tls';
     $mail->SMTPAuth = true;
     $mail->Username = 'caprosperoso@gmail.com';
     $mail->Password = 'uxjduxrnmalbahnk';
     $mail->setFrom($mail->Username);
     $mail->addAddress($email);

     $mail->Subject = 'Park City Pet Boarding - INQUIRY from '.$emailadd.', Contact-'.$telnum;
     $message= $inquiry;
     $mail->msgHTML($message);
     $mail->AltBody = strip_tags($message);
     $mail->send();
      echo "Thank you for your inquiry, we will get back to you shortly.";
     }
     catch (phpmailerException $e) {
       print $e->errorMessage(); //
     }
     catch (Exception $e){
      print $e->getMessage();
     }

header("location: index.php");
?>
