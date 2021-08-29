
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

<script>
function showReport(){

  var str = document.getElementById("mySelect").value;
  var repdate = document.getElementById("reptime").value;
  var repstatus = document.getElementById("mySelect1").value;
  var repservice = document.getElementById("mySelect2").value;

  //if (str=="") {
  //  document.getElementById("txtHint").innerHTML="";
  // return;
  //}
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  };
  xmlhttp.open("GET","reports.php?str="+str+"&repdate="+repdate+"&repstatus="+repstatus+"&repservice="+repservice,true);
  xmlhttp.send();
}
</script>
</head>
<h2>Park City Transactions</h2>
<p>This report lists all transactions in Park City.</p>
<body>

<form>
<!--select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="1">Peter Griffin</option>
<option value="2">Lois Griffin</option>
<option value="3">Joseph Swanson</option>
<option value="4">Glenn Quagmire</option>
</select-->
  <label for="report">Choose a report:</label>
  <select id="mySelect" onchange="myFunction()">
    <option value="All">ALL</option-->
    <!--option value="Week">Weekly</option-->
    <option value="Month">Monthly</option>
  </select>
  <input type="month" id="reptime" name="reptime" class="reptime" value="" disabled>
  <br><br>
  <label for="report1">Choose a status:</label>
  <select id="mySelect1" disabled>
    <option value="Confirmed">Confirmed</option>
    <option value="Reserved">Reserved</option>
    <option value="Cancelled">Cancelled</option>
    <option value="Checked Out">Checked Out</option>
  </select>
  <label for="report2">Choose a service:</label>
  <select id="mySelect2" disabled>
    <option value="Boarding">Boarding</option>
    <option value="Grooming">Grooming</option>
  </select>
  <br><br>
  <input type="button" value="Submit" onclick="showReport()">
</form>
<br>
<!--table>
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
</table-->
<div id="txtHint"><b>Transaction info will be listed here.</b></div>

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
</body>
</html>

