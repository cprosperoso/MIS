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

$error = "Username and password must not be empty!!!";
//$error1 = "Please enter your correct password";

//print "Connie";
$username = $_POST['username'];
$password = $_POST['password'];

//print $email_add;
//print $password;

if ($username != null  or $password != null){

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
                //$row1 = $presult->numRows();
                if($row1 != false){
                        $_SESSION["username"] = $username;
                        unset($_SESSION['error']);
                        header("location: index.php");
			//header("location: index.html");
                }
                else{
                        $message = 'Password incorrect!!!';
                        $_SESSION["error"] =  $message;
                        header("location: signin.php");
			//echo "<span>$error</span>";
                }
            }
            else{
	 	$message = 'User does not exist!!!';
		$_SESSION["error"] =  $message;
		//echo "<span>$error</span>";
		header("location: signin.php");
       	    }

   	    $stmt->close();
   	    $db->close();

	}
	else{
    //$message = 'Check your username and password!!!';
		$_SESSION["error"] =  $error;
		//echo "<span>$message</span>";
		header("location: signin.php");
  	}
}
else{
	//$message = 'Username and password must not be empty!!!';
	$_SESSION["error"] =  $error;
	//echo "<span>$message</span>";
	header("location: signin.php");
}
//unset[$error];

?>
