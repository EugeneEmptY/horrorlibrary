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
	else if($_GET['error'] == "invalidauthorname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid author name!</font></fieldset></div>";
	}
	else if($_GET['error'] == "authoralreadyexist"){
		echo "<div class = mdl><fieldset><font color = red>Author is already exists!</font></fieldset></div>";
	}
}
else if($_GET['insertion'] == "success"){
	echo "<div class = mdl><fieldset><font color = green>Added successfully!</font></fieldset></div>";
}


echo "<div class = mdl><fieldset><legend><h1>Author insertion</h1></legend>
	<form action = 'includes/AddAuthors.inc.php' method = 'POST'>
	Enter author name: <br><input type = 'text' name = 'authorName' placeholder = 'Author Name'><br><br>
	Enter author bio: <br><textarea cols = '25' rows = '5' name = 'authorBio' placeholder = 'Author bio'></textarea><br><br>
	<button type = 'submit' name = 'authorinsertion-submit'>Add author</button></fieldset></div></form>";

echo "<div class = mdl><fieldset><legend><h1>Author photo insertion</h1></legend>
	<form action = 'AddAuthorsPic.php' method = 'POST' enctype = 'multipart/form-data'>
	Enter author name: <br><input type = 'text' name = 'authorName' placeholder = 'Author Name'><br><br>
	Upload author pic: <br><input type = 'hidden' name = 'size' value = '1000000'>
	<div><input type = 'file' name = 'image'></div><br><br>
	<button type = 'submit' name = 'autorpicinsertion-submit'>Add author photo</button></fieldset></div></form>";

include 'DownPanel.php';
?>
</body>
</html>


