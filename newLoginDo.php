<?php
session_start();

include("includes/openDBconn.php");

//variables from newLogin
$firstname=addslashes($_POST["firstname"]);
$lastname=addslashes($_POST["lastname"]);
$username=addslashes($_POST["username"]);
$password=addslashes($_POST["password"]);
$signedforemail=addslashes($_POST["signedforemail"]);
$uniqueid=addslashes("NULL");

//checks for blanks
if(($firstname == "") || ($lastname == "") || ($username == "") || ($password == "") || ($signedforemail == ""))
{
	$_SESSION["errorMessage2"]="You must enter a value for all boxes!";
	header("Location:newLogin.php");
	exit;
}
else
{
	$_SESSION["errorMessage2"]="";
}

//is username in the database??????
$sql="SELECT username FROM projectlogin WHERE username='".$username."'";

$result = $conn->query($sql);

//if yes - redirect back and user must try again
if($result->num_rows>0)
{
	$_SESSION["errorMessage2"]="This username is already used, try again";
	header("location:newLogin.php");
	exit;
}
else
{
	$_SESSION["errorMessage2"]="";
}

//inserts the new user into the sql table
$sql="INSERT INTO projectlogin (uniqueid, firstname, lastname, username, password, signedforemail) VALUES (NULL, '".$firstname."', '".$lastname."', '".$username."', '".$password."', '".$signedforemail."')";

//echo($sql);

$result = $conn->query($sql);

include("includes/closeDBconn.php");

$_SESSION["errorMessage2"]="Your account has been created!!! Try loging in!";
header("Location:newLogin.php");

?>