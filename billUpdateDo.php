<?php
//connect to session
session_start();

//blocks users and redirects them to the index page
if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}

include("includes/openDBconn.php");

$Submit = $_POST['billUpdateDo'];

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
	$_SESSION["errorMessage"]="Please fill in the empty boxes!!";
	header("Location:billUpdate.php");
	exit;
}
//card number is numbers
else if (!is_numeric($cardnumber))
{
	$_SESSION["errorMessage"]="Please only use numbers for Card Number";
	header("Location:billUpdate.php");
	exit;
}
//date is numbers
else if (!is_numeric($zip))
{
	$_SESSION["errorMessage"]="Please only use numbers for Zip";
	header("Location:billUpdate.php");
	exit;
}
else if (!is_numeric($ccv))
{
	$_SESSION["errorMessage"]="Please only use numbers for CCV";
	header("Location:billUpdate.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}

//update the data base info
$sql="UPDATE PaymentInformation SET firstname = '".$firstname."', lastname = '".$lastname."', cardtype = '".$cardtype."', cardnumber = '".$cardnumber."', ccv = '".$ccv."', expiration = '".$expiration."', address = '".$address."', city = '".$city."', state = '".$state."', zip = '".$zip."', email = '".$email."', country = '".$country."' WHERE uniqueid =".$_POST["billUpdateDo"];

//echo($sql);

$result = $conn->query($sql);

include("include/closeDBconn.php");

$_SESSION["errorMessage"]="Your billing information has been successfully updated!!!!";
header("Location:billing.php");

?>