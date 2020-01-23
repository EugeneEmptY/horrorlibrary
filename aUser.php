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
body {
	color: yellow;
	background-image: url("http://horrorlibrary/images/horrorlibrary.jpg");
	background-color: #000;
	background-repeat: no-repeat;
	background-size: 100%;
	background-attachment: scroll;
	background-position: top center;
	margin: 0;
	padding: 0;
}
.mdl{
	text-align: center;
	margin-bottom: 0px;
}
fieldset{
	border: solid 2px #F00;
	background: #000;
	opacity: 0.75;
	margin-top: 10px;
	color: yellow;
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
	else if($_GET['error'] == "usertaken"){
		echo "<div class = mdl><fieldset><font color = red>Username is already taken!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidaccesslevel"){
		echo "<div class = mdl><fieldset><font color = red>You can set only 1 or 2 as access level!</font></fieldset></div>";
	}
}
else if($_GET['insertion'] == "success"){
	echo "<div class = mdl><fieldset><font color = green>Added successfully!</font></fieldset></div>";
}
echo "<div class = mdl><fieldset><legend><h1>User insertion</h1></legend>
	<form action = 'includes/AddUser.inc.php' method = 'post'>
	Enter user login: <br><input type = 'text' name = 'uid' placeholder = 'Users login'><br><br>
	Enter user e-mail: <br><input type = 'text' name = 'mail' placeholder = 'User e-mail'><br><br>
	Enter user password: <br><input type = 'password' name = 'pwd' placeholder = 'User password'><br><br>
	Enter user access level (1 or 2): <br><input type = 'text' name = 'ual' placeholder = 'User access level'><br><br>
	<button type = 'submit' name = 'userinsertion-submit'>Add user</button></fieldset></div></form>";

include 'DownPanel.php';
?>
</body>
</html>