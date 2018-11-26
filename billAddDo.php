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

//setting the posted variables to the same variable as on billAdd.php
$Submit = $_POST['billAddDo'];

$firstname=addslashes($_POST['firstname']);
$lastname=addslashes($_POST['lastname']);
$cardtype=addslashes($_POST['cardtype']);
$cardnumber=addslashes( substr($_POST["cardnumber"],-4));
$expiration=addslashes($_POST['expiration']);
$ccv=addslashes($_POST['ccv']);
$address=addslashes($_POST['address']);
$city=addslashes($_POST['city']);
$state=addslashes($_POST['state']);
$zip=addslashes($_POST['zip']);
$country=addslashes($_POST['country']);
$email=addslashes($_POST['email']);
$userid=$_SESSION["userid"];

//sends an error message if any of the boxes are blank
if(($firstname == "") || ($lastname == "") || ($address == "") || ($city == "") || ($state == "") || ($zip == "") || ($cardtype == "") || ($cardnumber == "") || ($expiration == "") || ($ccv == "") || ($email == "") || ($country == ""))
{
	$_SESSION["errorMessage"]="Do not leave any blank boxes";
	header("Location:billAdd.php");
	exit;
}
//making sure the cardNumber is made of only numbers
else if (!is_numeric($cardnumber))
{
	$_SESSION["errorMessage"]="Please only use numbers for Card Number";
	header("Location:billAdd.php");
	exit;
}
//expiration is only made up of numbers
else if (!is_numeric($zip))
{
	$_SESSION["errorMessage"]="Please only use numbers for zip";
	header("Location:billAdd.php");
	exit;
}
else if (!is_numeric($ccv))
{
	$_SESSION["errorMessage"]="Please only use numbers for ccv";
	header("Location:billAdd.php");
	exit;
}

else
{
	$_SESSION["errorMessage"]="";
}


//checking to see if this info exists
$sql= "SELECT * FROM PaymentInformation WHERE uniqueid= NULL AND firstname='".$firstname."' AND lastname='".$lastname."' AND cardtype='".$cardtype."' AND cardnumber='".$cardnumber."' AND expiration='".$expiration."' AND ccv='".$ccv."' AND address='".$address."' AND city='".$city."' AND state='".$state."' AND zip='".$zip."' AND email='".$email."' AND country='".$country."' AND userid = '".$userid."'";

$result = $conn->query($sql);


if($result->num_rows>0)
{
	$_SESSION["errorMessage"]="Please add new billing information";
	header("location:billAdd.php"); //if info does not exist, redirect to the billAdd page
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

//code that inserts the information into phpmyadmin sql table
$sql="INSERT INTO PaymentInformation (uniqueid, firstname, lastname, cardtype, cardnumber, expiration, ccv, address, city, state, zip, country, email, userid) VALUES (NULL, '".$firstname."', '".$lastname."', '".$cardtype."', '".$cardnumber."','".$expiration."', '".$ccv."', '".$address."', '".$city."', '".$state."', '".$zip."', '".$country."', '".$email."', '".$_SESSION["userid"]."')";

//echo $sql;
 
$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your billing information has been added";
header("Location:billing.php");

?>