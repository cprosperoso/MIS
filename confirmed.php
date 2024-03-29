<?php

require('PHPMailer.php');
require('SMTP.php');

function rand_code($len)
{
   $min_lenght= 0;
   $max_lenght = 100;
   $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $smallL = "abcdefghijklmnopqrstuvwxyz";
   $number = "0123456789";
   $bigB = str_shuffle($bigL);
   $smallS = str_shuffle($smallL);
   $numberS = str_shuffle($number);
   $subA = substr($bigB,0,5);
   $subB = substr($bigB,6,5);
   $subC = substr($bigB,10,5);
   $subD = substr($smallS,0,5);
   $subE = substr($smallS,6,5);
   $subF = substr($smallS,10,5);
   $subG = substr($numberS,0,5);
   $subH = substr($numberS,6,5);
   $subI = substr($numberS,10,5);
   $RandCode1 = str_shuffle($subA.$subD.$subB.$subF.$subC.$subE);
   $RandCode2 = str_shuffle($RandCode1);
   $RandCode = $RandCode1.$RandCode2;
 if ($len>$min_lenght && $len<$max_lenght)
 {
   $CodeEX = substr($RandCode,0,$len);
 }
 else
 {
   $CodeEX = $RandCode;
 }
 return $CodeEX;
}
//   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//if ($_POST['action'] == "insert"){
$booking_num=rand_code(7);
$owner_name = $_POST['owner_name'];
$email_add = $_POST['email_add'];

//print "Connie";
//print $owner_name;
//print $booking_num;

   $db = new SQLite3('park_city.db');

   $stmt = $db->prepare("UPDATE daily_trans SET owner_name=:owner_name, email_add=:email_add WHERE trans_id = (select trans_id from daily_trans order by trans_id desc limit 1)");
   $stmt->bindValue(':owner_name', $owner_name);   
   $stmt->bindValue(':email_add', $email_add);   
   $stmt->execute();

   $stmt=$db->prepare("INSERT INTO confirmed_trans (trans_date, check_in, check_out, pref_time, est_amount, service_type) SELECT trans_date, check_in, check_out, pref_time, est_amount, service_type from daily_trans WHERE trans_id=(select trans_id from daily_trans order by trans_id desc limit 1)");
   $stmt->execute();

   $stmt=$db->prepare("UPDATE confirmed_trans SET booking_num=:booking_num, trans_status=1  WHERE trans_id = (select trans_id from confirmed_trans order by trans_id desc limit 1)");
   $stmt->bindValue(':booking_num',$booking_num);
   $stmt->execute();

   $stmt=$db->prepare("SELECT * FROM confirmed_trans WHERE trans_id=(select trans_id from daily_trans order by trans_id desc limit 1)");
   $result = $stmt->execute();
   $row = $result->fetchArray();

   $stmt=$db->prepare("SELECT * FROM daily_trans WHERE trans_id=(select trans_id from daily_trans order by trans_id desc limit 1)");
   $result1 = $stmt->execute();
   $row1 = $result1->fetchArray();


//print $row;
   if($row)
{
//	print '<tr>';
//	if(!isset($res['booking_num'])) continue;

	//$result[$i]['booking_num'];//=$result['booking_num'];
//        print $row['booking_num'];
//	print "Connie";//$row;
//	print '</tr>';
//        $i++;
        print "<h2 align='center'> Booking Confirmed </h2>";

        print "<p><b> Booking Number: ".$row['booking_num']."</b>\n</p>";
        $booking = $row['booking_num'];
        print "<p><b> Check In Date: </b>".$row['check_in']."\n</p>";
        print "<p><b> Service Type: </b>".$row['service_type']."\n</p>";
	print "<p><b> Owner: </b>".$row1['owner_name']."\n</p>";
	if ($row['service_type']==2)
	{
            print "<p><b> Check Out Date: </b>".$row['check_out']."\n</p>";
	}
	else
	{
            print "<p><b> Preferred Time: </b>".$row['pref_time']."\n</p>";
        }
	print "<p><b> Estimated Amount: </b>".$row['est_amount']."\n</p>";

}
//   $sql = "SELECT * FROM confirmed_trans WHERE trans_id=(select trans_id from daily_trans order by trans_id desc limit 1)";
//   $result = $db->query($sql);
//   print $rowt;
 
   $stmt->close();
   $db->close();
//        }
     $mail = new PHPMailer\PHPMailer\PHPMailer;
     try{
     $mail->isSMTP();
     $mail->SMTPDebug = 0;
     $mail->Host = "smtp.gmail.com";
     $mail->Port = 587;
     $mail->SMTPSecure = 'tls';
     $mail->SMTPAuth = true;
     $mail->Username = 'caprosperoso@up.edu.ph';
     $mail->Password = 'ncpytohwtnbfgwzc';
     $mail->setFrom($mail->Username);
     $mail->addAddress($email_add);

     $mail->Subject = 'Your Booking Confirmation - '.$booking;
     $message = '<p>Dear '.$owner_name.',</p><p>Thank you for trusting your furbaby with us. Have a great day!</p><p>Sincerely yours,</p><p>Park City Pet Boarding</p>';
     $mail->msgHTML($message);
     $mail->AltBody = strip_tags($message);
     $mail->send();
//      echo 'Registration successful. Please check your email.';
     }
     catch (phpmailerException $e) {
       echo $e->errorMessage(); //
     }
     catch (Exception $e){
      echo $e->getMessage();
     }
?>
