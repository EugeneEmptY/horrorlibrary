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
	else if($_GET['error'] == "invalidnamesurname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid name and surname!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid name!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidsurname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid surname!</font></fieldset></div>";
	}
	else if($_GET['error'] == "userdoesntexist"){
		echo "<div class = mdl><fieldset><font color = red>Username doesnt exist!</font></fieldset></div>";
	}
}
else if($_GET['insertion'] == "success"){
	echo "<div class = mdl><fieldset><font color = green>Added successfully!</font></fieldset></div>";
}
echo "<fieldset><div class = mdl>To get user login <a href = 'wUsersInfo.php'><font color = 'yellow'>watch users info table</font></a><br>
		To get book id <a href = 'wBook.php'><font color = 'yellow'>watch books table</font></a><br>
		To get author id <a href = 'wAuthor.php'><font color = 'yellow'>watch authors table</font></a></mdl></fieldset>";
echo "<div class = mdl><fieldset><legend><h1>User info insertion</h1></legend>
	<form action = 'includes/AddUserInfo.inc..php' method = 'post'>
	Enter user login: <br><input type = 'text' name = 'uid' placeholder = 'Users login'><br><br>
	Enter user name: <br><input type = 'text' name = 'uname' placeholder = 'User name'><br><br>
	Enter user surname: <br><input type = 'text' name = 'usur' placeholder = 'User surname'><br><br>
	Enter book id: <br><input type = 'text' name = 'bookid' placeholder = 'User book id'><br><br>
	Enter author id: <br><input type = 'text' name = 'authid' placeholder = 'User author id'><br><br>
	Enter return date: <br><input type = 'date' name = 'retdate' placeholder = 'Return date'><br><br>
	<button type = 'submit' name = 'userinfoinsertion-submit'>Add user info</button></fieldset></div></form>";

include 'DownPanel.php';
?>
</body>
</html>