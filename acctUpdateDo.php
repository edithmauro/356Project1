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

include("includes/openDBconn.php"); //need to include this to connect to sql database

$firstname=addslashes($_POST["firstname"]);
$lastname=addslashes($_POST["lastname"]);
$username=addslashes($_POST["username"]);
$password=addslashes($_POST["password"]);
$signedforemail=addslashes($_POST["signedforemail"]);
$userid=$_SESSION['userid'];

//sends an error message if any of the boxes are blank
if(($firstname == "") ||($lastname == "") || ($username == "") || ($password == "") || ($signedforemail == ""))
{
	$_SESSION["errorMessage"]="You cannot leave any boxes blank";
	header("Location:acctUpdate.php");
	exit;
}
else
{
	$_SESSION["errorMessage"]="";
}


//updates sql 
$sql="UPDATE projectlogin SET firstname = '".$firstname."', lastname = '".$lastname."', username = '".$username."', password = '".$password."', signedforemail = '".$signedforemail."' WHERE uniqueid = ".$userid;

//echo($sql);

$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage"]="Your account has been Updated!!";
header("Location:acctInfo.php");

?>