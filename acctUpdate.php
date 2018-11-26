<?php
//connects to session
session_start();

//displays blank errormessage
if(empty($_SESSION["errorMessage"]))
{
	$_SESSION["errorMessage"]="";
}
echo("<?xml version=\"1.0\" encoding=\"UTF-8\"?>");

//blocks users and redirects them to the index page
if(empty($_SESSION["username"]))
{
	$_SESSION["errorMessage"]="You are not permitted to view this page!";
	header("Location:index.php");
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <title>Update Account</title>
    <style type="text/css">
		body{background-color: #f8fbfd;}
		form{background-color: #fff; width: 600px; margin-left: auto; margin-right: auto; display: block;}
        ul{ list-style:none; margin-top:5px; display: block;}
        ul li{ display:block; float:left; width:515px;}
        ul li label{ font-weight: bolder; float:left; padding:10px;}
        ul li input{ float:right; margin-right:30px; margin-top: 10px; border:1px solid #ccc; padding:10px; font-family: Georgia, Times, serif; width:240px;}
        li input:focus{ border:1px solid #999;}
        fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
        legend{ color:#000000; margin:0 10px 0 0; padding: 0 5px; font-size:14pt; font-weight:bold; }
        label span{ color:#ff0000; }
		ul li span{color: #0000ff; font-weight: bold;}
		li select{margin-left: 20px; margin-top: 15px;}
		imput#submit{width: 248px;}
		.BTN{padding: 5px; display:block; font-weight: bold; text-align: center; background: #eee;}
		h1{text-align:center; color: #800000; font-size: 40pt;}
		.hover{background-color: #000; color: #fff;}

	</style>
	
	<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
        </script>


<script>
$(document).ready(function(){
  $('.BTN').hover(function() {
    $(this).addClass('hover');
  }, function() {
    $(this).removeClass('hover');
  })
});

</script>


</head>

<body>
<img style = "width: 100%;" src = "https://steemitimages.com/DQmdXjWcK6k5D2eJQ8iWu1x3jk3EPcTnCkHxVj8Rs3TLahp/thin-header-1920x250.jpg" alt = "header">

<button style="font-size: 10pt; position: absolute; top: 40px; left: 30px; text-align:center; background-color: #800000;"><a style = "color: #FFF; text-decoration: none;" href = "logout.php">Logout</a></button>	

<button style="font-size: 10pt; position: absolute; top: 60px; left: 30px; text-align:center; background-color: #800000;"><a style = "color: #FFF; text-decoration: none;" href = "welcome.php">Welcome Page</a></button>

<h1 style="text-align: center; color: #800000;">Update Account Information</h1>

	<form id="form0" name="form0" method="post" action="acctUpdateDo.php"> <!--redirects to acctUpdateDo when done-->
    	<fieldset id="acctInfo">
        	<legend>Update Account</legend> <!--Variables you can update-->
        	<ul>
            	<li> <label title="Firstname" for="firstname">First Name<span>*</span></label> <input type="text" name="firstname" id="firstname" size="30" maxlength="30" /></li>
				<li> <label title="Lastname" for="lastname">Last Name<span>*</span></label> <input type="text" name="lastname" id="lastname" size="30" maxlength="30" /></li>
            	<li> <label title="Username" for="username">Username<span>*</span></label> <input type="text" name="username" id="username" size="30" maxlength="30" /></li>
				<li> <label title="Password" for="password">Password<span>*</span></label> <input type="password" name="password" id="password" size="30" maxlength="30" /></li>
				<li><label title="Signedforemail" for="signedforemail">Want to sign up for email?<span>*</span></label>
					<select name="signedforemail" id="signedforemail">
						<option value="0">No</option>
						<option value="1">Yes</option>
					</select>
				</li>
				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            	<li><button class = "BTN" id="submit" name="submit" type="submit">Update Info</button></li>
			   </ul>
			   
			   <br>
    	</fieldset>
		<?php
			$_SESSION["errorMessage"]="";
		?>

    	<script type="text/javascript">
        	document.getElementByID("uniqueid").focus();
    	</script>

	</form>
<br><br>
</body>

</html>

