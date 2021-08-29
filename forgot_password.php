<?php

if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");
//$this->isWithInTime($start, $end, $time);

$error = "username/password incorrect";
//$error1 = "Please enter your correct password";

//print "Connie";
$new_password = $_POST['new_password'];
$conf_password = $_POST['conf_password'];

//print $email_add;
//print $password;

if ($new_password != null  or $conf_password != null){

	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	    $db = new SQLite3('park_city.db');

	    $stmt = $db->prepare("SELECT * from users where username=:username");
	    $stmt->bindValue(':username',$username);
	    $result = $stmt->execute();
      	    $row = $result->fetchArray();
            if($row){

                //print "<h2 align='center'> User Exist!! </h2>";
            	$stmt1 = $db->prepare("SELECT * from users where password=:password");
                $stmt1->bindValue(':password',$password);
                $presult = $stmt1->execute();
                $row1 = $presult->fetchArray();
                if($row1){
			$_SESSION["username"] = $username;
			header("location: index.php");
			//header("location: index.html");
                }
                else{
			$_SESSION["error"] =  $error;
			header("location: index.html");
			//echo "<span>$error</span>";
                }
          }
         else{
		$_SESSION["error"] =  $error;
		//echo "<span>$error</span>";
		header("location: signin.html");
       	}

   	$stmt->close();
   	$db->close();

	}
	else{
        	$message = 'Check your username and password!!!';
		$_SESSION["error"] =  $message;
		//echo "<span>$message</span>";
		header("location: signin.html");
  	}
}
else{
	$message = 'Please check your email and password';
	$_SESSION["error"] =  $message;
	//echo "<span>$message</span>";
	header("location: signin.html");
}

?>

