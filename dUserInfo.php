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
	else if($_GET['error'] == "invalidSurname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid username!</font></fieldset></div>";
	}
	else if($_GET['error'] == "userdoesntexist"){
		echo "<div class = mdl><fieldset><font color = red>Username doesnt exist!</font></fieldset></div>";
	}
}
else if($_GET['deletion'] == "success"){
	echo "<div class = mdl><fieldset><font color = green>Deleted successfully!</font></fieldset></div>";
}
echo "<fieldset><div class = mdl>To get user surname <a href = 'wUsersInfo.php'><font color = 'yellow'>watch users info table</font></a></div></fieldset>";
echo "<div class = mdl><fieldset><legend><h1>User deletion</h1></legend>
	<form action = 'includes/DeleteUserInfo.inc.php' method = 'post'>
	Enter user surname you want to delete: <br><input type = 'text' name = 'usur' placeholder = 'Users surname'><br><br>
	<button type = 'submit' name = 'userinfodeletion-submit'>Delete user info</button></fieldset></div></form>";

include 'DownPanel.php';
?>
</body>
</html>