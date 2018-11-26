<?php
//starts session
session_start();

echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");

//blocks users and redirects them to the index page
if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE html>
<html xmls = "http://wwww.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>Welcome</title>


    <style type="text/css">
		body{background-image: url(http://i.imgur.com/LuyEW.jpg); background-color: #003366; width: 100%;}
	</style>
</head>

<body>
<img style = "width: 100%;" src = "https://steemitimages.com/DQmdXjWcK6k5D2eJQ8iWu1x3jk3EPcTnCkHxVj8Rs3TLahp/thin-header-1920x250.jpg" alt = "header">

<h1 style = "text-align:center; font-size: 60px; color: #800000; margin-top: 100px; text-transform: uppercase;"> Welcome <?php echo $_SESSION["username"]; ?> ! </h1>

<?php include("includes/menu.php"); ?>

<button style="font-size: 10pt; display: block; margin-left: auto; margin-right: auto; text-align:center; background-color: #800000;"><a style = "color: #FFF; text-decoration: none;" href = "logout.php">Logout</a></button>



</body>

</html>