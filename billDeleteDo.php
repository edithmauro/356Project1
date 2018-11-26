<?php
//connects to session
session_start();

//blocks users and redirects them to the index page
if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}

include("includes/openDBconn.php");

//connects to the billDELETE from the billDelete page
$Submit = $_POST['billDELETE'];

$sql="DELETE FROM PaymentInformation WHERE uniqueid=".$Submit; //deletes info

//echo($sql);

$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your billing information has been deleted";
header("Location:billing.php");

?>