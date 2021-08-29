<?php
if (!session_id()) session_start();

$username = $_SESSION['username'];
$db = new SQLite3('park_city.db');

//get user's email address
$stmt = $db->prepare("SELECT email from users where username=:username");
$stmt->bindValue(':username',$username);
$result = $stmt->execute();
//$stmt->bind_result($email);
$row = $result->fetchArray();

//while($row){
// echo "<tr><td>".$row['room_name']."</td><td>".$row['room_sz']."</td><td>".$row['status']"</td></tr>"
//}

$stmt->close();
$db->close();

$email_add=$row[0];

print "$email_add";
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

<h2>List of User's Transactions</h2>
<p>This report lists all transaction history of the user</p>

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
//$stmt = $db->prepare("SELECT room_name, room_sz, status from rooms");
//$stmt->$db->prepare("select trans_date, booking_ref, service, date_in, date_out, time_in room, amount from transactions where email=:email_add");
$stmt = $db->prepare("select tr.trans_date, tr.booking_ref, tr.email, ps.service, tr.date_in, tr.date_out, tr.time_in, tr.amount, ts.transstat from transactions tr, pet_services ps, trans_status ts, users usr where tr.service=ps.srv_code and tr.trans_stat=ts.transstat_code and tr.email=usr.email and tr.email=:email_add group by tr.trans_date order by tr.trans_date DESC");
$stmt->bindValue(':email_add',$email_add);
$result = $stmt->execute();
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
</table>

</body>
</html>

