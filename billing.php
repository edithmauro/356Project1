<?php
//connect to session
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1-strickt.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; UTF-8" />
    <title>Billing</title>
	<style type="text/css">
		body{background-color: #f8fbfd;}
		form{background-color: #fff; width: 600px; margin-left: auto; margin-right: auto; display: block;}
        ul{ list-style:none; margin-top:5px; display: block;}
        ul li{ display:block; float:left; width:515px;}
        ul li label{ font-weight: bolder; float:left; margin-bottom: 10px; margin-right: 10px;}
        ul li input{ float:right; margin-right:30px; margin-top: 10px; border:1px solid #ccc;  margin-bottom: 10px; font-family: Georgia, Times, serif; width:240px;}
        li input:focus{ border:1px solid #999;}
        fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
        legend{ color:#000000; margin:0 10px 0 0; padding: 0 5px; font-size:14pt; font-weight:bold; }
        label span{ color:#ff0000; }
		ul li span{color: #0000ff; font-weight: bold;}
		imput#submit{width: 248px;}
		.BTN{padding: 5px; display:block; font-weight: bold; text-align: center; margin: 0px auto; background: #eee;}
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

<h1 style="text-align: center; color: #800000;">Billing Information</h1>
	<?php 
		include("includes/menu.php"); 
		
		//Host Variables - sql
		$servername="localhost";
		$username="emauro";
		$password="Converse<3";
		$dbname="Project1";
	
		include("includes/openDBconn.php");
		
		//This selects the user's information from the database
		$sql= "SELECT * FROM PaymentInformation WHERE userid=".$_SESSION["userid"];
		
		$result=$conn->query($sql);
	?>
	
	<form id="form0" name="form0" method="post">
    	<fieldset id="billing">
        	<legend>Your Billing Information</legend>
			
			<?php while ($row = $result->fetch_assoc()){?> <!--info from the database-->
      <ul>
        	<li> <label title="Firstname" for="firstname">First Name on Card<span>*</span></label> <?php echo(trim($row["firstname"])); ?> </li>
				<li> <label title="Lastname" for="lastname">Last Name on Card<span>*</span></label> <?php echo(trim($row["lastname"])); ?></li>
				<li> <label title="Cardtype" for="cardtype">Card Type<span>*</span></label> <?php if($row["cardtype"] == 0){echo("Credit");} else{echo("Debit");} ?> </li>

				<li> <label title="Cardnumber" for="cardnumber">Card Number<span>*</span></label><?php echo(trim($a.$row["cardnumber"])); $a = "************";?></li>

				<li> <label title="Expiration" for="expiration">Expiration<span>*</span></label><?php echo(trim($row["expiration"])); ?></li>

				<li> <label title="Ccv" for="ccv">CCV<span>*</span></label> <?php echo(trim($row["ccv"])); ?></li>

        <li> <label title="Address" for="address">Address<span>*</span></label> <?php echo(trim($row["address"])); ?> </li>

				<li> <label title="City" for="city">City<span>*</span></label> <?php echo(trim($row["city"])); ?> </li>

				<li> <label title="State" for="state">State<span>*</span></label> <?php echo(trim($row["state"])); ?> </li>

				<li> <label title="Zip" for="zip">Zip<span>*</span></label> <?php echo(trim($row["zip"])); ?> </li>

				<li> <label title="Country" for="country">Country<span>*</span></label> <?php echo(trim($row["country"])); ?> </li>

				<li> <label title="Email" for="email">Email<span>*</span></label> <?php echo(trim($row["email"])); ?> </li>
				
				<!--$Submit = info posted-->
				<?php $Submit = $row["uniqueid"]; ?>


				<!--<?php //$Submit = ' firstname="'.$row["firstname"].'" AND lastname="'.$row["lastname"].'" AND cardtype="'.$row["cardtype"].'" AND cardnumber="'.$row["cardnumber"].'" AND ccv="'.$row["ccv"].'" AND expiration="'.$row["expiration"].'" AND address="'.$row["address"].'" AND city="'.$row["city"].'" AND state="'.$row["state"].'" AND zip="'.$row["zip"].'" AND country="'.$row["country"].'" AND email="'.$row["email"].'"'; ?>-->
				
				<li><button  id="billSubmit" name="billUpdate" type="submit" value='<?php echo($Submit); ?>' formaction="billUpdate.php" class = "BTN update" >Update Info</button><button  id="billSubmit" name="billDelete" type="submit" value='<?php echo($Submit); ?>' formaction="billDelete.php" class = "BTN delete">Delete Info</button></li>		
       		</ul>
			<?php } ?>
			<ul>
			<!--submit button-->
				<button  class = "BTN add" id="billSubmit" name="billAdd" type="submit" value='<?php echo($Submit); ?>' formaction="billAdd.php">Add Info</button>
				<li><span><?php echo $_SESSION["errorMessage"]; ?></span></li>
			</ul>
    	</fieldset>

		<?php
			$_SESSION["errorMessage"]="";
		?>

    	<script type="text/javascript">
        	document.getElementByID("uniqueid").focus();
    	</script>

	</form>
	
	<?php
		mysql_free_result($result);
		include("includes/closeDBconn.php");
	?>	
</body>