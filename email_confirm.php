
<?php
require('PHPMailer.php');
require('SMTP.php');

session_start();

$emailadd= $_POST['emailadd'];
$telnum = $_POST['telnum'];
$inquiry = $_POST['inq_message'];
//$email = 'cprosperoso@yahoo.com';
$booking_num = $_POST['booking_num'];
$username = $_POST['username'];
$srv_code = $_POST['srv_code'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$checkin_g = $_POST['checkin_g'];
$checkin_tg = $_POST['checkin_tg'];
$amount = $_POST['amount'];


if($srv_code=='BRD'){
     $message='Dear <b>'.$username.'</b>,
     <p>Thank you for trusting your furbaby with us. Below is the details of your booking!</p>
     <p></p>
     <p>Booking Number: <b>'.$booking_num.'</b></p>
     <p>Check In Date: <b>'.$checkin.'</b></p>
     <p>Check Out Date: <b>'.$checkout.'</b></p>
     <p>Amount: <b>'.$amount.'</b><p>
     <p></p>
     <p>Looking forward to see you soon! Have a great day!<p>
     <p></p>
     <p>Sincerely yours,</p>
     <b>Park City Pet Boarding<b>';
}
else{
     $message='Dear <b>'.$username.'</b>,
     <p>Thank you for trusting your furbaby with us. Below is the details of your booking!</p>
     <p></p>
     <p>Booking Number: <b>'.$booking_num.'</b></p>
     <p>Date: <b>'.$checkin_g.'</b></p>
     <p>Time: <b>'.$checkin_tg.'</b></p>
     <p>Amount: <b>'.$amount.'</b><p>
     <p></p>
     <p>Looking forward to see you soon! Have a great day!<p>
     <p></p>
     <p>Sincerely yours,</p>
     <b>Park City Pet Boarding<b>';
}


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
     $mail->addAddress($emailadd); //recipient

     $mail->Subject = 'Park City Pet Boarding Booking - '.$booking_num.' - Confirmation';
     /*$message='Dear <b>'.$username.'</b>,
     <p>Thank you for trusting your furbaby with us. Below is the details of your booking!</p>
     <p></p>
     <p>Booking Number: <b>'.$booking_num.'</b></p>
     <p>Service: <b>'.$service.'</b></p>
     <p>Check In Date: <b>'.$checkin.'</b></p>
     <p>Check Out Date: <b>'.$checkout.'</b></p>
     <p>Amount: <b>'.$amount.'<b><p>
     <p>Sincerely yours,</p>
     <b>Park City Pet Boarding<b>';*/
     $mail->msgHTML($message);
     $mail->AltBody = strip_tags($message);
     $mail->send();
//      print "Thank you for your inquiry, we will get back to you shortly.";
     }
     catch (phpmailerException $e) {
       print $e->errorMessage(); //
     }
     catch (Exception $e){
      print $e->getMessage();
     }

header("location: index.php");
?>
