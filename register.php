<CTYPE html>
<html>
<body>
<?php
if (!session_id()) session_start();

date_default_timezone_set("Asia/Hong_Kong");
$nowDate = date("Y-m-d h:i:sa");
//echo '<br>' . $nowDate;
$start = '08:00:00';
$end   = '19:00:00';
$time = date("H:i", strtotime($nowDate));
$now = date("Y-m-d");

$email = $_POST['reg_email'];
$username = $_POST['reg_username'];
$name = $_POST['reg_name'];
$password = $_POST['reg_password'];
$cpassword = $_POST['reg_cpassword'];

/*print $email;
print $username;;
print $password;
print $cpassword;*/

if ($email != null  and $username != null and $name != null and $password != null and $cpassword != null){
 //   if (($checkin > $now) and ($checkout > $checkin)){

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$db = new SQLite3('park_city.db');

	$stmt = $db->prepare("SELECT * from users where email=:email_add");
	$stmt->bindValue(':email_add',$email);
	$result = $stmt->execute();
      	$row = $result->fetchArray();
        if($row != false){
           $message = 'Email already exist!';
           $_SESSION["error"] = $message;
           $_SESSION["email"] = $email;
           $_SESSION["username"] = $username;
           $_SESSION["name"] = $name;
           header("location: signup.php");          
        }
        else{
           if($password != $cpassword){
             $message = 'Password does not match!';
             $_SESSION["error"] = $message;
             $_SESSION["email"] = $email;
             $_SESSION["username"] = $username;
             $_SESSION["name"] = $name;
             header("location: signup.php");
           }
           else{
	     //new user registration
   	     $stmt = $db->prepare("INSERT INTO users (id, email, username, name, password, cpassword) VALUES (NULL,:reg_email,:reg_username,:reg_name,:reg_password,:reg_cpassword)");
   	     $stmt->bindValue(':reg_email',$email);
   	     $stmt->bindValue(':reg_username',$username);
   	     $stmt->bindValue(':reg_name',$name);
	     $stmt->bindValue(':reg_password',$password);
  	     $stmt->bindValue(':reg_cpassword',$cpassword);
   	     $stmt->execute();
   	     $stmt->close();
   	     $db->close();
             
             $message = 'User Registered Successfully!';
             $_SESSION["error"] = $message;

             header("location: signin.php");
          }
        }
      }
      else{
        $error = "Fields cannot be empty!";
        $_SESSION["error"] =  $error;
        $_SESSION["email"] = $email;
        $_SESSION["username"] = $username;
        $_SESSION["name"] = $name;
        header("location: signup.php");
      }
}
else{
    $error = "Input cannot be empty!";
    $_SESSION["error"] =  $error;
    $_SESSION["email"] = $email;
    $_SESSION["username"] = $username;
    $_SESSION["name"] = $name;
    header("location: signup.php");
}
//echo file_get_contents("signup.php");
?>

</body>
</html>
