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
	background-image: url("http://horrorlib.ru/images/horrorlibrary.jpg");
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

echo "<div class = mdl><fieldset><legend><h1>What do you want to change?</h1></legend>
	<form action = 'includes/ChangeUser.inc.php' method = 'post'>
	Enter user login: <br><input type = 'text' name = 'login' placeholder = 'User login'><br><br>
	Change user e-mail: <input type = 'radio' name = 'cmail' value = 'changeMail'><br>
	Change user access level: <input type = 'radio' name = 'cal' value = 'changeAccessLevel'><br><br>
	<button type = 'submit' name = 'change-submit'>Submit</button></fieldset></div></form>";
	
if(isset($_GET['userexist'])){
	if($_GET['userexist'] == "goon"){

		$login = $_POST['login'];

		if($_POST['cmail']=='changeMail' && $_POST['cal']=='changeAccessLevel'){
			echo "<form action = 'includes/ChangeUser.inc.php' method = 'post'>";
			echo "<div class = mdl><fieldset><legend><h1>Changing data for ".$login;
			echo "</h1></legend>";
			echo "Enter new e-mail: <br><input type = 'text' name = 'e-mail' placeholder = 'New e-mail'><br><br>
				Change user access level (1 or 2):  <br><input type = 'text' name = 'access' placeholder = 'Access level'><br><br>
				<button type = 'submit' name = 'userchange-submit'>Change</button></fieldset></div></form>";
		}
		else if($_POST['cmail']=='changeMail'){
			echo "<form action = 'includes/ChangeUser.inc.php' method = 'post'>";
			echo "<div class = mdl><fieldset><legend><h1>Changing data for ".$login;
			echo "</h1></legend>";
			echo "Enter new e-mail: <br><input type = 'text' name = 'e-mail' placeholder = 'New e-mail'><br><br>
				<button type = 'submit' name = 'userchange-submit'>Change</button></fieldset></div></form>";
		}
		else if($_POST['cal']=='changeAccessLevel'){
			echo "<form action = 'includes/ChangeUser.inc.php' method = 'post'>";
			echo "<div class = mdl><fieldset><legend><h1>Changing data for ".$login;
			echo "</h1></legend>";
			echo "Change user access level (1 or 2):  <br><input type = 'text' name = 'access' placeholder = 'Access level'><br><br>
				<button type = 'submit' name = 'userchange-submit'>Change</button></fieldset></div></form>";
		}
	}
}

if(isset($_GET['error'])){
	if($_GET['error'] == "emptyfields"){
		echo "<div class = mdl><fieldset><font color = red>Enter user login!</font></fieldset></div>";
	}
	else if($_GET['error'] == "userdoesntexist"){
		echo "<div class = mdl><fieldset><font color = red>Username doesnt exist!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidemail"){
		echo "<div class = mdl><fieldset><font color = red>Invalid e-mail!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidaccesslevel"){
		echo "<div class = mdl><fieldset><font color = red>Access level must be 1 or 2!</font></fieldset></div>";
	}
}
include 'DownPanel.php';
?>
</body>
</html>