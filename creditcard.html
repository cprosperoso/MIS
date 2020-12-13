<CTYPE html>

<html>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {background-color: powderblue;}
h1   {relative; color: blue; padding:10px 25px;}
p    {color: black; padding:2px 10px;         
      font-family:Arial;
      font-size:17px;
}

//body {font-family: Arial, Helvetica, sans-serif;}

.myButton {
	background-color:#7892c2;
	-moz-border-radius:25px;
	-webkit-border-radius:25px;
	border-radius:28px;
	border:1px solid #4e6096;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:17px;
	padding:10px 45px ;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
 	position: sticky;
	top: 50%;
	left: 39%;
}
.myButton:hover {
	background-color:#476e9e;
}
.myButton:active {
//	position:relative;
	top:50%;
}

.myButton1 {
        background-color:#7892c2;
        -moz-border-radius:25px;
        -webkit-border-radius:25px;
        border-radius:28px;
        border:1px solid #4e6096;
        display:inline-block;
        cursor:pointer;
        color:#ffffff;
        font-family:Arial;
        font-size:17px;
        padding:10px 45px ;
        text-decoration:none;
        text-shadow:0px 1px 0px #283966;
        position: sticky;
        top: 50%;
        left: 53%;
}
.myButton1:hover {
        background-color:#476e9e;
}
.myButton1:active {
//      position:relative;
        top:50%;
}


.center {
  width: 310px;
  border: 3px solid green;
  padding: 50px;
  margin: auto;
}
</style>
<div class="center">
<!--?php

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");
//$this->isWithInTime($start, $end, $time);

//print "Connie";
$checkin = $_POST['checkin_g'];
$checkint = $_POST['checkin_tg'];
$psize = $_POST['petsize'];
$p_type = $_POST['p_type'];
$est_amount = $_POST['est_amount'];

if ($checkin != null  or $checkint != null or $p_type != null){

    if (($checkin > $now) and (($checkint >= $start )&& ($checkint <= $end))) {

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$db = new SQLite3('park_city.db');

		//daily transaction
   		$stmt = $db->prepare("INSERT INTO daily_trans (trans_id, trans_date, check_in, pref_time, pet_size, pet_type, service_type) VALUES (NULL,datetime('now'),:checkin_g,:checkin_tg,:petsize,:pet_type,1)");
   		$stmt->bindValue(':checkin_g',$checkin);
   		$stmt->bindValue(':checkin_tg',$checkint);
   		$stmt->bindValue(':petsize',strtolower($psize));
   		$stmt->bindValue(':pet_type',strtolower($p_type));
   		$stmt->execute();
   		
   		//get available room
   		$stmt = $db->prepare('SELECT * FROM confirmed_trans where check_in=:checkin_g and pref_time=:checkin_tg');
                $stmt->bindValue(':checkin_g',$checkin);
                $stmt->bindValue(':checkin_tg',$checkint);
		//$stmt->bindValue(':petsize',strtolower($psize));
   		$result = $stmt->execute();
	    	$row = $result->fetchArray();
		print $row;
	    	if ($row) {
	    	//date.time not available pop a message
	    		$message = 'Requested schedule not available. Please select another date or time.';
				print "<SCRIPT>
					alert('$message');
					window.history.back();
				</SCRIPT>";
		    		exit;
	    	}
	    	else{
			//print "<div class='center'>";
			print "<h2 align='center'> Booking Available </h2>";  
			print "<p><b> Date:</b> ".$checkin."\n</p>"; 
			print "<p><b> Time:</b> ".$checkint."\n</p>";
			//print "<p> Est. Amount: </p>".$psize."\n";

			switch (strtolower($psize)){
			     case "small": print "<p><b> Est. Amount:</b> "."50 Baht \n</p>"; 
				  $est_amount=50.00; break;
			     case "medium": print "<p><b> Est. Amount:</b> "."60 Baht \n</p>"; 
				  $est_amount=60.00; break;
			     default: 
				print "<p><b> Est. Amount:</b> "."70 Baht \n</p>";
				$est_amount=70.00;
			}
		//	print "</div>";

				$stmt = $db->prepare("UPDATE daily_trans SET est_amount=:est_amount WHERE trans_id = (select trans_id from daily_trans order by trans_id desc limit 1)");
                //$stmt = $db->prepare("INSERT INTO daily_trans (trans_id, trans_date, check_in, pref_time, pet_size, pet_type, service_type) VALUES (NULL,datetime('now'),:checkin_g,:checkin_tg,:petsize,:pet_type,1)");
                $stmt->bindValue(':est_amount',$est_amount);
                $stmt->execute();

	    	}   	

   		
   		$stmt->close();   		
   		$db->close();

	}
    }
    else{
        $message = 'Requested Date or Time is invalid!!';
        
        print "<SCRIPT>
                alert('$message');
		window.history.back();
        </SCRIPT>";
    }
}
else{
	$message = 'Please check date and time requested!';

	print "<SCRIPT>
		alert('$message');
		window.history.back();
	</SCRIPT>";
}
?-->
<!--?php
$owner_name = $_GET['owner_name'];

print $owner_name;

$db = new SQLite3('park_city.db');
$stmt = $db->prepare("UPDATE daily_trans SET owner_name=:owner_name WHERE trans_id = (select trans_id from daily_trans order by trans_id desc limit 1)");
                //$stmt = $db->prepare("INSERT INTO daily_trans (trans_id, trans_date, check_in, pref_time, pet_size, pet_type, service_type) VALUES (NULL,datetime('now'),:checkin_g,:checkin_tg,:petsize,:pet_type,1)");
$stmt->bindValue(':owner_name',$owner_name);
$stmt->execute();
$stmt->close();
$db->close();

?-->

<!--form action="/creditcard.php" method="post"-->
<form name="creditcard" action="confirm.php" method="post">
<h2 align="center">Confirm Booking</h2>
Email Address:<br><input type="text" name="email_add"><br>
Cardname:<br><input type="text" name="owner_name"><br>
Cardnumber:<br><input type="integer" name="ccnum"><br>
Cardexpiry:<br><!--input type="date" name="cardexp"<br-->
<input type="month" id="start" name="start" min="2018-03" value="2018-05"><br>
<!--/form-->
<!--button id="myButton" class="myButton" onclick="location.href='https://parkcitypetboarding.cf/confirm.php'" method="post">Submit</button-->
<button id="myButton" class="myButton">Submit</button>
<button id="myButton1" class="myButton1" onclick="location.href='https://parkcitypetboarding.cf/grooming.php'">Cancel</button>
<p id="ParkCity"></p>

</form>
<!--?php
$owner_name = $_GET['owner_name'];

print $owner_name;

$db = new SQLite3('park_city.db');
$stmt = $db->prepare("UPDATE daily_trans SET owner_name=:owner_name WHERE trans_id = (select trans_id from daily_trans order by trans_id desc limit 1)");
                //$stmt = $db->prepare("INSERT INTO daily_trans (trans_id, trans_date, check_in, pref_time, pet_size, pet_type, service_type) VALUES (NULL,datetime('now'),:checkin_g,:checkin_tg,:petsize,:pet_type,1)");
$stmt->bindValue(':owner_name',$owner_name);
$stmt->execute();
$stmt->close();
$db->close();

?-->



</div>
</body>
</html>
