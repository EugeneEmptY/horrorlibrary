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
if (isset($_POST['userUid']) && isset($_POST['accessLevel'])) {
	mysqli_query($conn, "SELECT alUsers AND uidUsers FROM users WHERE uidUsers='".$_POST['userUid']);
}
echo "<div class = mdl><fieldset>Welcome, ".$_SESSION["userUid"];
echo "<br>Your access level is: ".$_SESSION['accessLevel'];
echo "</fieldset></div>";
include 'includes/dbh.inc.php';
if (isset($_SESSION['userUid']) && isset($_SESSION['accessLevel'])) {
	mysqli_query($conn, "SELECT alUsers FROM users WHERE uidUsers=".$_SESSION['userUid']);
	if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == '2') {
		echo "<fieldset><a href = 'aUser.php'><font color = 'yellow'>Add user</font></a><br>
		<a href = 'aUserInfo.php'><font color = 'yellow'>Add user info</font></a><br>
		<a href = 'dUser.php'><font color = 'yellow'>Delete user</font></a><br>
		<a href = 'dUserInfo.php'><font color = 'yellow'>Delete user info</font></a><br>
		<a href = 'dBook.php'><font color = 'yellow'>Delete book</font></a><br>
		<a href = 'dAuthor.php'><font color = 'yellow'>Delete author</font></a><br>
		<a href = 'wUsers.php'><font color = 'yellow'>Watch users table</font></a><br>
		<a href = 'wUsersInfo.php'><font color = 'yellow'>Watch users info table</font></a><br>
		<a href = 'wBook.php'><font color = 'yellow'>Watch books table</font></a><br>
		<a href = 'wAuthor.php'><font color = 'yellow'>Watch authors table</font></a></fieldset>";
	} else if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] != '2') {
		echo "<fieldset><a href = 'ProfileInfo.php'><font color = 'yellow'>Watch your info</font></a></fieldset>";
	}
}
include 'DownPanel.php';
?>
<?php

		/*<a href = 'cUser.php'><font color = 'yellow'>Change user access level/e-mail</font></a><br>
		<a href = 'cUserInfo.php'><font color = 'yellow'>Change user info</font></a><br>
		<a href = 'cAuthorInfo.php'><font color = 'yellow'>Change author info</font></a><br>
		<a href = 'cBookInfo.php'><font color = 'yellow'>Change book info</font></a><br>*/
?>
</body>
</html>