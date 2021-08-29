<?php
if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");

$booking_num=$_POST['booking_num'];
$status = $_POST['tr_status'];

//print "check in: $status\n";
/*if ($status=="Confirmed"){
   $trans_status = "CONF";
}
elseif ($status=="Cancelled"){
   $trans_status = "CNCL";
}
elseif ($status=="Reserved"){
   $trans_status = "RES";
}
endif*/
switch (strtolower($status)){
case "confirmed":
 $trans_status = "CONF";
break;
case "cancelled":
 $trans_status = "CNCL";
break;
case "reserved":
 $trans_status = "RES";
break;
default:
 $trans_status = "CO";
}

$db = new SQLite3('park_city.db');


$stmt=$db->prepare("UPDATE rooms SET status='VAC' WHERE room_name in (SELECT room FROM transactions WHERE booking_ref=:booking_num)");
$stmt->bindValue(':booking_num', $booking_num);   
$stmt->bindValue(':status', $trans_status);   
$stmt->execute();

$stmt=$db->prepare("UPDATE transactions SET trans_stat=:status WHERE booking_ref=:booking_num");
$stmt->bindValue(':booking_num', $booking_num);   
$stmt->bindValue(':status', $trans_status);   
$stmt->execute();

//if($srv_code == 'BRD'){
//$stmt=$db->prepare("UPDATE rooms SET status='VAC' WHERE room_name=(SELECT room FROM transactions WHERE trans_stat='CONF')");
//}

//$result = $stmt->execute();
//$row = $result->fetchArray();
$stmt->close();
$db->close();

//echo json_encode($row);


?>
