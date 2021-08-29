<?php
if (!session_id()) session_start();

//$_SESSION["mySelect"] = $mySelect;
//$_SESSION["mySelect1"] = $mySelect1;
//$_SESSION["mySelect2"] = $mySelect2;
//$_SESSION["reptime"] = $reptime;

$mySelect = $_POST['mySelect'];
$mySelect1 = $_POST['mySelect1'];
$mySelect2 = $_POST['mySelect2'];
$reptime = $_POST['reptime'];

print "$mySelect";
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

<h2>Park City Transactions</h2>
<p>This report lists all transactions in Park City.</p>

<!--form action="/action_page.php"-->
  <label for="report">Choose a report:</label>
  <select id="mySelect" onchange="myFunction()" value="All">
    <option value="All">ALL</option-->
    <option value="Week">Weekly</option>
    <option value="Month">Monthly</option>
  </select>
<?php $_SESSION["mySelect"] = $mySelect;?>
  <input type="month" id="reptime" name="reptime" class="reptime" value="" disabled>
  <br><br>
  <label for="report1">Choose a status:</label>
  <select id="mySelect1" disabled>
    <option value="Confirmed">Confirmed</option>
    <option value="Reserved">Reserved</option>
    <option value="Cancelled">Cancelled</option>
  </select>
  <label for="report2">Choose a service:</label>
  <select id="mySelect2" disabled>
    <option value="Boarding">Boarding</option>
    <option value="Grooming">Grooming</option>
  </select>
  <br><br>
  <input type="submit" value="Submit" onclick="viewTransactions()">
<!--/form-->
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
//if($mySelect == "All"){
$stmt = $db->prepare("select tr.trans_date, tr.booking_ref, tr.email, ps.service, tr.date_in, tr.date_out, tr.time_in, tr.amount, ts.transstat from transactions tr, pet_services ps, trans_status ts, users usr where tr.service=ps.srv_code and tr.trans_stat=ts.transstat_code and tr.email=usr.email group by tr.trans_date order by tr.trans_date DESC");
$result = $stmt->execute();
//}
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
<script>
function myFunction(){
  //var x = document.getElementById("mySelect").value;

  if(document.getElementById("mySelect").value == "Month"){
    document.getElementById('reptime').type = "month";
    document.getElementById('reptime').value = "2021-05";
    document.getElementById('reptime').disabled = false;
    document.getElementById('mySelect1').disabled = false;
    document.getElementById('mySelect2').disabled = false;
  }
  else if(document.getElementById("mySelect").value == "Week"){
    document.getElementById('reptime').type = "week";
    document.getElementById('reptime').value = "2021-W19";
    document.getElementById('reptime').disabled = false;
    document.getElementById('mySelect1').disabled = false;
    document.getElementById('mySelect2').disabled = false;
  }
  else{
    document.getElementById('reptime').disabled = true;
    document.getElementById('mySelect1').disabled = true;
    document.getElementById('mySelect2').disabled = true;
    document.getElementById('reptime').value = "";
    document.getElementById('mySelect1').value = "";
    document.getElementById('mySelect2').value = "";
  }
}
</script>
<script>
function viewTransactions(){

	var repdate = document.getElementById("mySelect").value; 
	var reptime = document.getElementById("reptime").value;
	var repstatus = document.getElementById("mySelect1").value;
	var repservice = document.getElementById("mySelect2").value;
        
        var request = $.ajax({
   		url: 'reports.php',
   		type: 'POST',
   		dataType: 'html',
                data:{
                     repdate: repdate,
                     reptime: reptime,
                     repstatus: repstatus,
                     repservice: repservice
                }
		/*success: function(data)
		{
                  var booking_ref = data[0];
                  var email = data[1];
                  var service = data[2];
                  var date_in = data[3];
                  var date_out = data[4];
                  var time_in = data[5];
                  var amount = data[6];
                  var stat = data[7];
                  $('#output').html("<p><b>Booking Ref: "+booking_ref+"<b><p>");
                  $('#output').append("<p>Email: "+email+"</p>");
                  $('#output').append("<p>Service: "+service+"</p>");
                  $('#output').append("<p>Date In: "+date_in+"</p>");
                  $('#output').append("<p>Date Out: "+date_out+"</p>");
                  $('#output').append("<p>Time In: "+time_in+"</p>");
                  $('#output').append("<p>Amount: "+amount+"</p>");
                  $('#output').append("<p>Status: "+stat+"</p>");
		}*/
 	});

	request.done( function ( data ) {
 		$('#myBtn').html( data );
 	});

	request.fail( function ( jqXHR, textStatus) {
 		console.log( 'Sorry: ' + textStatus );
 	});

}
</script>
</body>
</html>

