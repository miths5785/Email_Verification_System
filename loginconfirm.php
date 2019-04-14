<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

$con = new mysqli ($servername, $username, $password, $dbname);

$email = $_POST['email'];
$passcode = $_POST['password'];

$sql1 = $con->query("SELECT username FROM register WHERE username = '$email'");
$sql2 = $con->query("SELECT * FROM register WHERE username = '$email' AND password = '$passcode'");
$sql3 = $con->query("SELECT username FROM register WHERE username = '$email' AND verified = '1'");

if($sql1->num_rows == 1)
{
	if($sql3->num_rows == 1)
	{
		if($sql2->num_rows == 1)
		{
			echo "You Are Now Logged In...";
		}
		else
		{
			echo "Your Username And Passwords Do Not Match!";
		}
	}
	else
	{
		echo "Please Verify Your Account";
	}
}
else
{
	echo "Please Register Your Account First";
}
?>