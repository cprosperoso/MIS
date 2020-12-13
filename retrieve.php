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
	padding:10px 50px ;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
 	position: sticky;
	top: 50%;
	left: 46%;
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
<?php

/*function rand_code($len)
{
   $min_lenght= 0;
   $max_lenght = 100;
   $bigL = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $smallL = "abcdefghijklmnopqrstuvwxyz";
   $number = "0123456789";
   $bigB = str_shuffle($bigL);
   $smallS = str_shuffle($smallL);
   $numberS = str_shuffle($number);
   $subA = substr($bigB,0,5);
   $subB = substr($bigB,6,5);
   $subC = substr($bigB,10,5);
   $subD = substr($smallS,0,5);
   $subE = substr($smallS,6,5);
   $subF = substr($smallS,10,5);
   $subG = substr($numberS,0,5);
   $subH = substr($numberS,6,5);
   $subI = substr($numberS,10,5);
   $RandCode1 = str_shuffle($subA.$subD.$subB.$subF.$subC.$subE);
   $RandCode2 = str_shuffle($RandCode1);
   $RandCode = $RandCode1.$RandCode2;
 if ($len>$min_lenght && $len<$max_lenght)
 {
   $CodeEX = substr($RandCode,0,$len);
 }
 else
 {
   $CodeEX = $RandCode;
 }
 return $CodeEX;
}*/
//   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//if ($_POST['action'] == "insert"){
//$booking_num=rand_code(7);
//$owner_name = $_GET['owner_name'];

//print $owner_name;
//print $booking_num;

   $db = new SQLite3('park_city.db');
//   $stmt=$db->prepare("INSERT INTO confirmed_trans (trans_date, check_in, check_out, pref_time, est_amount, service_type) SELECT trans_date, check_in, check_out, pref_time, est_amount, service_type from daily_trans WHERE trans_id=(select trans_id from daily_trans order by trans_id desc limit 1)");
//   $stmt->execute();

//   $stmt=$db->prepare("UPDATE confirmed_trans SET booking_num=:booking_num, trans_status=1  WHERE trans_id = (select trans_id from confirmed_trans order by trans_id desc limit 1)");
//   $stmt->bindValue(':booking_num',$booking_num);
//   $stmt->execute();

//   $stmt=$db->prepare("SELECT * FROM confirmed_trans WHERE trans_id=(select trans_id from daily_trans order by trans_id desc limit 1)");
$booking_num = $_POST['booking_num'];
   $stmt = $db->prepare('SELECT * from confirmed_trans where booking_num=:booking_num');
   $stmt->bindValue(':booking_num',$booking_num);

   $result = $stmt->execute();
   $row = $result->fetchArray();
   if($row)
{
        print "<h2 align='center'> Booking Confirmed </h2>";

        print "<p><b> Booking Number: ".$row['booking_num']."</b>\n</p>";
        print "<p><b> Check In Date: </b>".$row['check_in']."\n</p>";
        //print "<p><b> Service Type: </b>".$row['service_type']."\n</p>";
	if ($row['service_type']==2)
	{
            print "<p><b> Check Out Date: </b>".$row['check_out']."\n</p>";
            print "<p><b> Service Type: </b>Boarding\n</p>";
	}
	else
	{
            print "<p><b> Preferred Time: </b>".$row['pref_time']."\n</p>";
            print "<p><b> Service Type: </b>Grooming\n</p>";
        }
	print "<p><b> Estimated Amount: </b>".$row['est_amount']."\n</p>";

}
 
   else{
     print "<h2 align='center'> No booking found!</h2>";
     //exit;
   }
   $stmt->close();
   $db->close();
//        }

// $link = mysqli_connect("localhost", "root", "admin", "park_city");
//require('PHPMailer.php');
//require('SMTP.php');

//print "Connie";
/*
$book = $_POST['booking_num'];

//print $book;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
   $db = new SQLite3('park_city.db');

   $stmt = $db->prepare('CREATE TABLE IF NOT EXISTS confirmed_trans(trans_id INTEGER PRIMARY KEY AUTOINCREMENT, check_in DATE, check_out DATE, pref_time TIME, trans_status INT, rm_assigned VARCHAR(15), service_type INT, booking_num VARCHAR(15))');
   $stmt->execute();
   $stmt = $db->prepare('SELECT * from confirmed_trans where booking_num=:booking_num');
   $stmt->bindValue(':booking_num',$book);
   $result = $stmt->execute();
   #$row=$result->affected_rows;
   $row = $result->fetchArray();
   if ($row){
        print "<h2 align='center'> Booking Confirmed </h2>";

        print "<p><b> Booking Number: ".$row['booking_num']."</b>\n</p>";
        print "<p><b> Check In Date: </b>".$row['check_in']."\n</p>";
        print "<p><b> Service Type: </b>".$row['service_type']."\n</p>";
        if ($row['service_type']==2)
        {
            print "<p><b> Check Out Date: </b>".$row['check_out']."\n</p>";
        }
        else
        {
            print "<p><b> Preferred Time: </b>".$row['pref_time']."\n</p>";
        }
        print "<p><b> Estimated Amount: </b>".$row['est_amount']."\n</p>";
     
	exit;
   }
   else{
     print "<h1>No booking found!</h1>";
     exit;
   }
}*/

//mysqli_close($link);
?>


<!--form action="/creditcard.php" method="post"-->
<button id="myButton" class="myButton" onclick="location.href='https://parkcitypetboarding.cf/'">OK</button>
<!--button id="myButton1" class="myButton1" onclick="location.href='https://parkcitypetboarding.cf/grooming.php'">Cancel</button-->
<p id="ParkCity"></p>

</div>
</body>
</html>
