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
    <title>Add Billing</title>
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
		li select{margin-left: 120px; margin-top: 15px;}
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


<h1 style="text-align: center; color: #800000;">Add New Billing Information</h1>
	
	<?php
	include("includes/openDBconn.php");
	
	//Sets data for this page as a variable to make crossing data between pages easier
	$Submit = $_POST['billAdd'];
	?>
	
	<form id="form0" name="form0" method="post" action="billUpdateDo.php">
    	<fieldset id="billing">
        	<legend>Adding Billing Info</legend> <!--This is the variables you can change that correspond with the sql table-->
        	<ul>
				<li> <label title="Firstname" for="firstname">First Name on Card<span>*</span></label> <input type="text" name="firstname" id="firstname" size="30" maxlength="30" /></li>
				
            	<li> <label title="Lastname" for="lastname">Last Name on Card<span>*</span></label> <input type="text" name="lastname" id="lastname" size="30" maxlength="30" /></li>

				<li><label title="Cardtype" for="cardtype">Card Type<span>*</span></label>
					<select name="cardtype" id="cardtype">
						<option value="1">Credit</option>
						<option value="0">Debit</option>
					</select>
				</li>
				<li> <label title="Cardnumber" for="cardnumber">Card Number<span>*</span></label> <input type="text" name="cardnumber" id="cardnumber" size="30" minlength = "16" maxlength="16" minlength/></li>

				<li> <label title="Expiration" for="expiration">Expiration Date<span>*</span></label> <input type="date" name="expiration" id="expiration" size="30" maxlength="30" /></li>

				<li> <label title="Ccv" for="ccv">CCV<span>*</span></label> <input type="text" name="ccv" id="ccv" size="30" maxlength="3" /></li>

				<li> <label title="Address" for="address">Address<span>*</span></label> <input type="text" name="address" id="address" size="30" maxlength="30" /></li>

				<li> <label title="City" for="city">City<span>*</span></label> <input type="text" name="city" id="city" size="30" maxlength="30" /></li>

				<li> <label title="State" for="state">State<span>*</span></label> <input type="text" name="state" id="state" size="30" maxlength="2" /></li>

				<li> <label title="Zip" for="zip">Zip<span>*</span></label> <input type="text" name="zip" id="zip" size="30" maxlength="5" /></li>

				<li> <label title="Country" for="country">Country<span>*</span></label> <input type="text" name="country" id="country" size="30" maxlength="30" /></li>

				<li> <label title="Email" for="email">Email<span>*</span></label> <input type="email" name="email" id="email" size="30" maxlength="30" /></li>
				
				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
            	<li><button  class = "BTN" id="billSubmit" name="billAddDo" type="submit" value='<?php echo($Submit); ?>' formaction="billAddDo.php">Add Info</button></li>
       		</ul>

    	</fieldset>

		<?php
			$_SESSION["errorMessage"]=""; //blank
		?>

    	<script type="text/javascript">
        	document.getElementByID("uniqueid").focus(); //uniqueid = primary key
    	</script>

	</form>

</html>

