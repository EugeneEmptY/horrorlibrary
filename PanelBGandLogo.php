<?php
	include 'sesop.php';
?>
<html>
<head>
<title>
Horror Library
</title>
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
.auth{
	margin-left: 65%;
	color: white;
	font-size: 18;
	margin-bottom: -60;
}
.loggedin{
	margin-left: 68%;
	color: white;
	font-size: 18;
	margin-bottom: -38;
}
</style>
</head>
<?php
echo "<html><head><title>Horror Library</title></head><body>";
echo "<img src = 'images/ghost.png' align = 'left' WIDTH = '214' HEIGHT = '130'>
<img src = 'images/ghost2.png' align = 'right' WIDTH = '214' HEIGHT = '130'>";
if(isset($_SESSION['userId'])){
	echo "<div class = loggedin><form action = 'includes/logout.inc.php' method = 'post'>
	<a href = 'Profile.php'><font color = 'white'>".$_SESSION['userUid']."</font></a>
	<button type = 'submit' name = 'logout-submit'>Logout</button>
</form></div>";
}
else{
	echo "<div class = auth><form action = 'includes/login.inc.php' method = 'post'>
	<input type = 'text' name = 'mailuid' placeholder = 'E-mail/Username'>
	<button type = 'submit' name = 'login-submit'>Login</button><br>
	<input type = 'password' name = 'pwd' placeholder = 'Password'>
	<a href = 'signup.php'><font color = 'white'>Signup</font></a>
</form></div>";
}
echo "<a href = 'http://horrorlibrary/'><p class = 'mdl'><img src = 'images/HLlogo.png' WIDTH = '305' HEIGHT = '136' ALT = 'HLLogo'></p></a>
<div class = 'mdl'><img src = 'images/Panel.png' width = '1499' height = '130' usemap = '#panel'></div>";
echo"</body>
<MAP NAME = 'panel'>
<AREA SHAPE = 'rect' COORDS = '100, 33, 280, 98' HREF = 'http://horrorlibrary/' TARGET = '_self'>
<AREA SHAPE = 'rect' COORDS = '465, 33, 660, 98' HREF = 'http://horrorlibrary/Books.php' TARGET = '_self'>
<AREA SHAPE = 'rect' COORDS = '797, 33, 1070, 98' HREF = 'http://horrorlibrary/Authors.php' TARGET = '_self'>
<AREA SHAPE = 'rect' COORDS = '1150, 33, 1459, 98' HREF = 'http://horrorlibrary/Contacts.php' TARGET = '_self'>
</MAP></html>"
?>
</html>