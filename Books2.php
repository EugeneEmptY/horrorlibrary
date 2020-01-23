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
</style>
</head>
<body>
<?php
include 'PanelBGandLogo.php';
include 'SidePanelsForAds.php';
include 'includes/dbh.inc.php';
if (isset($_SESSION['userUid']) && isset($_SESSION['accessLevel'])) {
	mysqli_query($conn, "SELECT alUsers FROM users WHERE uidUsers=".$_SESSION['userUid']);
	if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == '2') {
		echo "<form action = 'BookSearch.php' method = 'post'>
		<fieldset><div class = mdl><font color = 'yellow'>Search by author: <input type = 'text' name = 'searchByAuth' placeholder = 'Enter by author name'></font>
		<button type = 'submit' name = 'searchbyauthor-submit'>Ok</button></form>&#8195;
		
		<form action = 'BookSearch.php' method = 'post'>
		<font color = 'yellow'>Search by book title: <input type = 'text' name = 'searchByBT' placeholder = 'Enter by book title'></font>
		<button type = 'submit' name = 'searchbybooktitle-submit'>Ok</button></form>&#8195;
		
		<a href = 'AddBook.php'><font color = 'yellow'>Add book</font></a></div></fieldset>";
	} else if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] != '2') {
		echo "<div class = mdl><fieldset><a href = 'BookSearch.php'><font color = 'yellow'>Search</font></a></fieldset></div>";
	}
}
$books5 = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '5'");
$rows = mysqli_num_rows($books5);
$cols = mysqli_num_fields($books5);
$fiveth = mysqli_fetch_array($books5);
if($fiveth != FALSE){
	echo "<fieldset><legend>$fiveth[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$fiveth[nAuthors]</b><br>
		<font color = 'white'>$fiveth[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
$books6 = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '6'");
$rows = mysqli_num_rows($books6);
$cols = mysqli_num_fields($books6);
$sixth = mysqli_fetch_array($books6);
if($sixth != FALSE){
	echo "<fieldset><legend>$sixth[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$sixth[nAuthors]</b><br>
		<font color = 'white'>$sixth[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
$books7 = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '7'");
$rows = mysqli_num_rows($books7);
$cols = mysqli_num_fields($books7);
$seventh = mysqli_fetch_array($books7);
if($seventh != FALSE){
	echo "<fieldset><legend>$seventh[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$seventh[nAuthors]</b><br>
		<font color = 'white'>$seventh[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
$books8 = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '8'");
$rows = mysqli_num_rows($books8);
$cols = mysqli_num_fields($books8);
$eightth = mysqli_fetch_array($books8);
if($eightth != FALSE){
	echo "<fieldset><legend>$books8[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$books8[nAuthors]</b><br>
		<font color = 'white'>$books8[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
echo "<div class = 'mdl'><font color = 'white'><a href = 'http://horrorlibrary/Books.php' target = '_self'>1</a> &ensp; 2</font></div>";
include 'DownPanel.php';
?>
</body>
</html>