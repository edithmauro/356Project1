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

//posted variables
$Submit = $_POST['shipUpdateDo'];

//data from shipUpdate
$firstname=addslashes($_POST['firstname']);
$lastname=addslashes($_POST['lastname']);
$address=addslashes($_POST['address']);
$city=addslashes($_POST['city']);
$state=addslashes($_POST['state']);
$zip=addslashes($_POST['zip']);
$country=addslashes($_POST['country']);
$userid=$_SESSION["userid"];

//any empty boxes? = error and redirect if there are
if(($firstname == "") || ($lastname == "") || ($address == "") || ($city == "") || ($state == "") || ($zip == "") || ($country == ""))
{
	$_SESSION["errorMessage"]="You cannot leave any box blank!!!! Please try again!";
	header("Location:shipUpdate.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

//updates the data with the new inputed data
$sql="UPDATE ShippingAddress SET firstname = '".$firstname."', lastname = '".$lastname."', address = '".$address."', city = '".$city."', state = '".$state."', zip = '".$zip."', country = '".$country."' WHERE uniqueid =".$_POST["shipUpdateDo"];

//echo($sql);

$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="You shipping information has been updated!!";
header("Location:shipping.php");

?>