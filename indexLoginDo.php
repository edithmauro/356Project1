<?php
//starts the session
session_start();

include("includes/openDBconn.php");

//username and password from the initial login page
$username=addslashes($_POST["username"]);
$password=addslashes($_POST["password"]);

//if the username n password are in database, redirect to welcome page
$sql="SELECT * FROM projectlogin WHERE username='".$username."' AND password='".$password."'";

$result = $conn->query($sql);

if($result->num_rows==1)
{
	$_SESSION["errorMessage"]="";

	while ($row = $result->fetch_assoc()){ //pulls info from database
		$_SESSION['username'] = $row["username"];
		$_SESSION['userid'] = $row["uniqueid"];
	}
	
	header("location:welcome.php");
}
else
{
	$_SESSION["errorMessage"]="Your username/password is incorrect, please try again";
	header("location:index.php"); //if user or password are incorrect, redirect back to index page
	exit;
}

include("includes/closeDBconn.php");
?>