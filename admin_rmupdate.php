<?php
if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");

$room_name=$_POST['room_name'];
$status = $_POST['tr_status'];

print "$status";

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
case "vac":
 $status = "VAC";
break;
case "res":
 $status = "RES";
break;
case "occ":
 $status = "OCC";
break;
case "co":
 $status = "CO";
break;
default:
 $status = "HLD";
}

$db = new SQLite3('park_city.db');


//$stmt=$db->prepare("UPDATE rooms SET status='VAC' WHERE room_name in (SELECT room FROM transactions WHERE booking_ref=:booking_num)");
//$stmt->bindValue(':booking_num', $booking_num);   
//$stmt->bindValue(':status', $trans_status);   
//$stmt->execute();

$stmt=$db->prepare("UPDATE rooms SET status=:status WHERE room_name=:room_name");
$stmt->bindValue(':room_name', $room_name);   
$stmt->bindValue(':status', $status);   
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
