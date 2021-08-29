<?php
if (!session_id()) session_start();

/*$db = new SQLite3('park_city.db');

//get user's email address
$stmt = $db->prepare("SELECT room_name, room_sz, status from rooms");
$result = $stmt->execute();
$row = $result->fetchArray();

//while($row){
// echo "<tr><td>".$row['room_name']."</td><td>".$row['room_sz']."</td><td>".$row['status']"</td></tr>"
//}

$stmt->close();
$db->close();*/
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

<h2>List of Park City Registered Users</h2>
<p>This report lists all registered users with their contact details.</p>

<table>
  <tr>
    <th>Name</th>
    <th>Username</th>
    <th>Email</th>
  </tr>
<?php 
$db = new SQLite3('park_city.db');

//get user's email address
$stmt = $db->prepare("SELECT name, username, email from users");
$result = $stmt->execute();
//$row = $result->fetchArray();

while($row = $result->fetchArray()){ ?>
  <tr>
    <td><?php echo $row[name];?></td>
    <td><?php echo $row[username];?></td>
    <td><?php echo $row[email];?></td>
  </tr>
<?php }
$stmt->close();
$db->close();
?>
</table>

</body>
</html>

