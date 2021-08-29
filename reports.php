<?php
if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");

$repdate=$_POST['repdate']; // All, weekly, monthly
$reptime = $_SESSION['reptime']; //date
$repstatus = $_POST['repstatus']; //confirmed, reserved, 
$repservice = $_POST['repservice']; //boarding, grooming

//print "amount: $est_amount\n";

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
</head>
<body>

<p></p>

<table>
  <tr>
    <th>Transaction Date</th>
    <th>Booking Reference</th>
    <th>Email</th>
    <th>Service</th>
    <th>Check In Date</th>
    <th>Check Out Date</th>
    <th>Scheduled Time</th>
    <th>Amount</th>
    <th>Status</th>
  </tr>
<?php 
$db = new SQLite3('park_city.db');

//get user's email address
//ALL
if($_GET['str'] == 'Month'){
$stmt = $db->prepare("select tr.trans_date, tr.booking_ref, tr.email, ps.service, tr.date_in, tr.date_out, tr.time_in, tr.amount, ts.transstat from transactions tr, pet_services ps, trans_status ts, users usr where tr.service=ps.srv_code and tr.trans_stat=ts.transstat_code and tr.email=usr.email and ps.service=:repservice and ts.transstat=:repstatus and strftime('%Y-%m', trans_date) = :repdate group by tr.trans_date order by tr.trans_date DESC");
$stmt->bindValue(':repservice',$_GET['repservice']);
$stmt->bindValue(':repstatus',$_GET['repstatus']);
$stmt->bindValue(':repdate',$_GET['repdate']);
$result = $stmt->execute();
}
else if($_GET['str'] == 'Week'){
$stmt = $db->prepare("select tr.trans_date, tr.booking_ref, tr.email, ps.service, tr.date_in, tr.date_out, tr.time_in, tr.amount, ts.transstat from transactions tr, pet_services ps, trans_status ts, users usr where tr.service=ps.srv_code and tr.trans_stat=ts.transstat_code and tr.email=usr.email and ps.service=:repservice and ts.transstat=:repstatus and strftime('%Y-%W', trans_date) = :repdate group by tr.trans_date order by tr.trans_date DESC");
$stmt->bindValue(':repservice',$_GET['repservice']);
$stmt->bindValue(':repstatus',$_GET['repstatus']);
$stmt->bindValue(':repdate',$_GET['repdate']);
$result = $stmt->execute();
}
else{
$stmt = $db->prepare("select tr.trans_date, tr.booking_ref, tr.email, ps.service, tr.date_in, tr.date_out, tr.time_in, tr.amount, ts.transstat from transactions tr, pet_services ps, trans_status ts, users usr where tr.service=ps.srv_code and tr.trans_stat=ts.transstat_code and tr.email=usr.email group by tr.trans_date order by tr.trans_date DESC");
$result = $stmt->execute();
}
//$row = $result->fetchArray();

while($row = $result->fetchArray()){ ?>
  <tr>
    <td><?php echo $row[trans_date];?></td>
    <td><?php echo $row[booking_ref];?></td>
    <td><?php echo $row[email];?></td>
    <td><?php echo $row[service];?></td>
    <td><?php echo $row[date_in];?></td>
    <td><?php echo $row[date_out];?></td>
    <td><?php echo $row[time_in];?></td>
    <td><?php echo $row[amount];?></td>
    <td><?php echo $row[transstat];?></td>
  </tr>
<?php }


$stmt->close();
$db->close();
?>

</body>
</html>
