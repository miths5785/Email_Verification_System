<?php
if(isset($_GET['vkey']))
{

	$vkey = $_GET['vkey'];

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "test";

	$con = new mysqli ($servername, $username, $password, $dbname);

	$sql = $con->query("SELECT verified, vkey FROM register WHERE verified = 0 AND vkey = '$vkey'");

	if($sql->num_rows == 1)
	{
		$update = $con->query("UPDATE register SET verified = 1 WHERE vkey = '$vkey'");

		if($update)
		{
			echo "Your Email Has Been Verified";
		}
		else
		{
			echo "mysqli->error";
		}
	}
	else
	{
		echo "The Email Is Invalid Or Has Been Already Verified!";
	}
}
else
{
	die("Something Went Wrong!");
}
?>