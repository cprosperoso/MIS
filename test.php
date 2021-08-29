<?php
if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");
//$this->isWithInTime($start, $end, $time);

//print "Connie";

$booking_num=$_POST['booking_num'];
//$checkin = $_SESSION['checkin'];      //boarding
//$checkout = $_SESSION['checkout'];    //boarding
//$checkin_g = $_SESSION['checkin_g'];  //grooming
//$checkin_tg = $_SESSION['checkin_tg'];//grooming
$numroom = $_SESSION['numroom'];
//$petsize = $_SESSION['petsize'];
//$p_type = $_SESSION['p_type'];
$srv_code = $_POST['srv_code'];
//$est_amount = $_SESSION['est_amount'];
$email = $_POST['email'];

//print "$srv_code";
/*print "booking_num: $booking_num\n";
print "check in: $checkin\n";
print "check out: $checkout\n";
print "checkin groom: $checkin_g\n";
print "time groom: $checkin_tg\n";
print "numroom: $numroom\n";
print "petsize: $petsize\n";
print "pettype: $p_type\n";
print "srv_code: $srv_code\n";
print "email: $email\n";
print "amount: $est_amount\n";


if ($_SERVER['REQUEST_METHOD'] == 'POST'){*/

$db = new SQLite3('park_city.db');
$i=0;
do{
//for ($i=1; $i<=$numroom; $i++){
//if($srv_code == 'BRD'){
 $stmt=$db->prepare("UPDATE transactions SET trans_stat='CONF' WHERE booking_ref=:booking_num");
 $stmt->bindValue(':booking_num', $booking_num);   
 $stmt->execute();


// if($srv_code == 'BRD'){
 $stmt=$db->prepare("UPDATE rooms SET status='RES' WHERE room_name in (SELECT room FROM transactions WHERE trans_stat='CONF' and booking_ref=:booking_num)");
// }
 $stmt->bindValue(':booking_num', $booking_num);

 $stmt->execute();
 $i++;
}while($i<$numroom);
$stmt->close();
$db->close();


?>
