<?php
	include 'sesop.php';
?>
<html>
<head>
<title>
Horror Library
</title>
<LINK REL = "Stylesheet" HREF = "mainstyle.css" TYPE = "text/css">
<style>
fieldset{
	border: solid 2px #F00;
	background: #000;
	opacity: 0.75;
	margin-top: 10px;
	color: yellow;
}
.mdl{
	text-align: center;
	margin-bottom: 0px;
}
</style>
</head>
<body>
<?php
include 'PanelBGandLogo.php';
include 'SidePanelsForAds.php';
if(isset($_GET['error'])){
	if($_GET['error'] == "emptyfields"){
		echo "<div class = mdl><fieldset><font color = red>Fill in all fields!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidmailuid"){
		echo "<div class = mdl><fieldset><font color = red>Invalid username and e-mail!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invaliduid"){
		echo "<div class = mdl><fieldset><font color = red>Invalid username!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidmail"){
		echo "<div class = mdl><fieldset><font color = red>Invalid e-mail!</font></fieldset></div>";
	}
	else if($_GET['error'] == "passwordcheck"){
		echo "<div class = mdl><fieldset><font color = red>Your passwords do not match!</font></fieldset></div>";
	}
	else if($_GET['error'] == "usertaken"){
		echo "<div class = mdl><fieldset><font color = red>Username is already taken!</font></fieldset></div>";
	}
}
else if($_GET['signup'] == "success"){
	echo "<div class = mdl><fieldset><font color = green>Signed up successfully!</font></fieldset></div>";
}
echo "<div class = mdl><fieldset><legend><h1>SignUp</h1></legend>
<form action = 'includes/signup.inc.php' method = 'post'>
Enter your username   <input type = 'text' name = 'uid' placeholder = 'Username'><br><br>
Enter your e-mail   <input type = 'text' name = 'mail' placeholder = 'E-Mail'><br><br>
Create a password  <input type = 'password' name = 'pwd' placeholder = 'Password'><br><br>
Confirm your password   <input type = 'password' name = 'pwd-repeat' placeholder = 'Repeat password'><br><br>
<button type = 'submit' name = 'signup-submit'>Signup</button>
</form></fieldset></div>";
	
include 'DownPanel.php';
?>
</body>
</html>