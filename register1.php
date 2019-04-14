<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$con = new mysqli ($servername, $username, $password, $dbname);

$email = $_POST['email'];
$passcode = $_POST['password'];
$vkey = rand(000000,999999);

$confirm = $con->query("SELECT username FROM register WHERE username = '$email'");

if($confirm->num_rows == 1)
	{
		echo "Email Already Exists....Try Registering From Different Email....";
	}

else
	{
		$sql = "INSERT INTO register (username,password,vkey) VALUES ('$email','$passcode','$vkey')";

		if($con->query($sql))
			{
				$to = $email;
				$subject = "Email Verification";
				$message = "<a href='https://localhost/Project 1/verify.php?vkey = $vkey'>Click Here To Verify</a>";
				$headers = "From: miths.tcet@gmail.com \r\n";
				$headers .= "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset = UTF-8" . "\r\n";
				mail($to,$subject,$message,$headers);
				header('location:thankyou.php');
			}

		else
			{
				echo "Unsuccessful";
			}
	}
?>