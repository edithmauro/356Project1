<?php
session_start();

//blocks users and redirects them to the index page
if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}

include("includes/openDBconn.php");

//connects to the shipdelete from the shipDelete page
$Submit = $_POST['shipDeleteYes'];

$sql="DELETE FROM ShippingAddress WHERE uniqueid=".$Submit; //deletes info

$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your information has been successfully deleted";
header("Location:shipping.php");

?>