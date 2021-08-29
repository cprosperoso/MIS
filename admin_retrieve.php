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

$db = new SQLite3('park_city.db');

$stmt=$db->prepare("select tr.booking_ref, tr.email, ps.service, tr.date_in, tr.date_out, tr.time_in, tr.amount, ts.transstat, usr.name from transactions tr, pet_services ps, trans_status ts, users usr where tr.booking_ref=:booking_num and tr.service=ps.srv_code and tr.trans_stat=ts.transstat_code and tr.email=usr.email");
//$stmt=$db->prepare("select booking_ref, email from transactions where booking_ref=:booking_num");
$stmt->bindValue(':booking_num', $booking_num);
$result = $stmt->execute();
$row = $result->fetchArray();
$stmt->close();
$db->close();

echo json_encode($row);


?>
