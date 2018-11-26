<?php
session_start();
/*
//blocks users and redirects them to the index page
if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}
*/
include("includes/openDBconn.php");

//posted variables
$Submit = $_POST['shipAddDo'];

$firstname=addslashes($_POST['firstname']);
$lastname=addslashes($_POST['lastname']);
$address=addslashes($_POST['address']);
$city=addslashes($_POST['city']);
$state=addslashes($_POST['state']);
$zip=addslashes($_POST['zip']);
$country=addslashes($_POST['country']);
$userid=$_SESSION["userid"];


//$uniqueid = 1;

//any empty boxes??? - error to fill up all the empty boxes
if(($firstname == "") || ($lastname == "") ||($address == "") || ($city == "") || ($state == "") || ($zip == "")|| ($country == "")){
	$_SESSION["errorMessage"]="Do not leave any blank boxes!!";
	header("Location:shipAdd.php");
	exit;
}
else if(!is_numeric($zip)){
	$_SESSION["errorMessage"]="Please only use numbers";
	header("Location:shipAdd.php");
	exit;

}
else
{
	$_SESSION["errorMessage"]="";
}


//does the input already exist??? if yes - send back to shipAdd page
$sql= "SELECT * FROM ShippingAddress WHERE uniqueid=NULL AND firstname='".$firstname."' AND lastname='".$lastname."'AND address='".$address."' AND city='".$city."' AND state='".$state."' zip='".$zip."'AND country='".$country."' AND userid = '".$userid."'";
//echo $sql;
$result = $conn->query($sql);

if($result->num_rows>0)
{
	$_SESSION["errorMessage"]="This shipping information already exists, please try again.";
	header("location:shipAdd.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

//inserting the new data into sql
$sql="INSERT INTO ShippingAddress (uniqueid, firstname, lastname, address, city, state, zip, country, userid) VALUES (NULL, '".$firstname."', '".$lastname."', '".$address."', '".$city."', '".$state."', ".$zip.", '".$country."', '".$_SESSION["userid"]."')";
//echo $sql;
$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your shipping information has been added!!";
header("Location:shipping.php");

?>