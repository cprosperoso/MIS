<CTYPE html>

<html>
<body>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {background-color: powderblue;}
h1   {color: blue; padding:10px 25px;}
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
        padding:10px 30px ;
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
        padding:10px 30px ;
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
  width: 350px;
  border: 3px solid green;
  padding: 20px;
  margin: auto;
}

</style>
<div class="center">
<?php

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");
//$this->isWithInTime($start, $end, $time);

//print "Connie";
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$numroom = $_POST['quantity'];
$psize = $_POST['petsize'];
$p_type = $_POST['p_type'];
$est_amount = $_POST['est_amount'];

if ($checkin != null  or $checkout != null or $p_type != null){

    if (($checkin > $now) and ($checkout > $checkin)){

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		$db = new SQLite3('park_city.db');

		//daily transaction
   		$stmt = $db->prepare("INSERT INTO daily_trans (trans_id, trans_date, check_in, check_out, num_of_room, pet_size, pet_type, service_type) VALUES (NULL,datetime('now'),:checkin,:checkout,:quantity,:petsize,:pet_type,2)");
   		$stmt->bindValue(':checkin',$checkin);
   		$stmt->bindValue(':checkout',$checkout);
		$stmt->bindValue(':quantity',$numroom);
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
			//print "<div> </div>";
			//$numOfDays = $checkin->diff($checkout);
			$numOfDays = (strtotime($checkout) - strtotime($checkin)) / (60 * 60 * 24);
			print "<h2 align='center'> Booking Available </h2>";  
			print "<p><b> Check In Date: </b>".$checkin."\n</p>"; 
			print "<p><b> Check Out Date: </b>".$checkout."\n</p>";
			print "<p><b> Number of Days: </b>".$numOfDays."\n</p>";
			print "<p><b> Number of rooms: </b>".$numroom."\n</p>";
			print "<p><b> Pet Size: </b>".$psize."\n</p>";
			

			switch (strtolower($psize)){
			     case "small": 
				$est_amount = ($numroom*60 * $numOfDays);
				//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p"; 
				break;
			     case "medium": 
				$est_amount = ($numroom*75 * $numOfDays);
				//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>"; 
				break;
			     default: 
				$est_amount = ($numroom*88 * $numOfDays);
				//print "<p><b> Est. Amount:</b> ".$est_amount."\n</p>";
				
			}
			print "<p><b> Est. Amount:</b>		".$est_amount." Baht \n</p>";

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
//	alert("Walang entry");
}
?>

<button id="myButton" class="myButton" onclick="location.href='https://parkcitypetboarding.cf/creditcard.php'">Confirm Booking</button>
<button id="myButton1" class="myButton1" onclick="location.href='https://parkcitypetboarding.cf/boarding.php'">Cancel</button>
<p id="ParkCity"></p>


</div>
</body>
</html>
