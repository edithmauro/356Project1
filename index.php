<?php 
session_start();
echo ("<?xml version = \"1.0\" encoding = \"UTF-8\"?>"); ?>
<!DOCTYPE html>
<html xmls = "http://wwww.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>Login</title>

	<style type="text/css">
		body{background-image: url(http://i.imgur.com/LuyEW.jpg); background-color: #003366;}

		form{background-color: #fff; width: 600px; margin-left: auto; margin-right: auto; display: block; height: 100%;}
        ul{ list-style:none; margin-top:5px; display: block; margin-bottom: 50px;}
        ul li{ display:block; float:left; width:515px;}
        ul li label{ font-weight: bolder; float:left; padding:10px;}
        ul li input{ float:right; margin-right:30px; margin-top: 10px; border:1px solid #ccc; padding:10px; font-family: Georgia, Times, serif; width:240px;}
        li input:focus{ border:1px solid #999;}
        fieldset{ padding:10px; border:1px solid #ccc; width:400px; overflow:auto; margin:10px;}
        legend{ color:#000000; margin:0 10px 0 0; padding: 0 5px; font-size:14pt; font-weight:bold; }
		label span{ color:#ff0000; }
		label {color: navy;}
		ul li span{color: #0000ff; font-weight: bold;}
		imput#submit{width: 248px;}
		.BTN{padding: 5px; color: #000; font-weight: bold; text-align: center; background: #eee;}
		.BTN a{padding: 5px; color: #000; font-weight: bold; text-align: center; background: #eee;}
		h1{text-align:center; color: #800000; font-size: 40pt;}
		.hover{background-color: #000; color: #fff;}
		.create{font-size:10pt; text-decoration: none; display:block; float:right;}

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
<!--<img id = "headerImage" style = "width: 100%;"src = 'http://www.game-art-hq.com/wp-content/uploads/2015/06/Links-Blacklist-Banner-Fro.jpg' alt = "header image">-->
<h1 style = "text-align:center; color: #800000;"> Login To Your Account</h1>
<hr>
<?php include("includes/menu.php"); ?>

<div>
<!--initial form for the user to login-->
	<form style = "text-align:center; background-color: #f9f9f9;" id="form0" name="form0" method="post" action="indexLoginDo.php">
	<a class = "BTN create" href="newLogin.php">Create Account</a> <!--redirects user to create new acct-->
    	<fieldset id="LOgin">
        	<legend>Account Login</legend>
        	<ul>
            	<li> <label title="Username" for="username">Username<span>*</span></label> <input type="text" name="username" id="username" size="30" maxlength="30" /></li>
				<li> <label title="Password" for="password">Password<span>*</span></label> <input type="password" name="password" id="password" size="30" maxlength="30" /></li>
       		</ul>
			
			<br><br><br>
			<span><?php echo $_SESSION["errorMessage"]; ?> </span>
			<span>		<?php echo $_SESSION["errorMessage2"]="";?></span>
			<br><br>
			<button  class = "BTN login" id="submit" name="submit" type="submit">Login</button>
			
<br><br>
    	</fieldset>

		<?php
			$_SESSION["errorMessage"]="Your username/password is incorrect, please try again";
		?>


    	<script type="text/javascript">
        	document.getElementByID("uniqueid").focus();
    	</script>

	</form>
	<br>
<div>



</body>

</html>