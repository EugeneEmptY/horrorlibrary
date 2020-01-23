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
.rht{
	text-align: right;
	margin-top: 0px;
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
		echo "<form action = 'BookSearch.php' method = 'post'>
		<fieldset><div class = mdl><font color = 'yellow'>Search by author: <input type = 'text' name = 'searchByAuth' placeholder = 'Enter by author name'></font>
		<button type = 'submit' name = 'searchbyauthor-submit'>Ok</button></form>&#8195;
		
		<form action = 'BookSearch.php' method = 'post'>
		<font color = 'yellow'>Search by book title: <input type = 'text' name = 'searchByBT' placeholder = 'Enter by book title'></font>
		<button type = 'submit' name = 'searchbybooktitle-submit'>Ok</button></div></fieldset></form>";
	}
}

if(isset($_GET['error'])){
	if($_GET['error'] == "emptyfields"){
		echo "<div class = mdl><fieldset><font color = red>Fill in all fields!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidauthorname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid author name!</font></fieldset></div>";
	}
	else if($_GET['error'] == "booksofthisauthordontfound"){
		echo "<div class = mdl><fieldset><font color = red>Book of this author doesnt exist!</font></fieldset></div>";
	}
}
else if($_GET['searching'] == "success"){
	echo "<div class = mdl><fieldset><font color = green>Searched successfully!</font></fieldset></div>";
}

$books = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '1'");
$rows = mysqli_num_rows($books);
$cols = mysqli_num_fields($books);
$first = mysqli_fetch_array($books);
if($first != FALSE){
	echo "<fieldset><legend>$first[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$first[nAuthors]</b><br>
		<font color = 'white'>$first[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
$books2 = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '2'");
$rows = mysqli_num_rows($books2);
$cols = mysqli_num_fields($books2);
$second = mysqli_fetch_array($books2);
if($second != FALSE){
	echo "<fieldset><legend>$second[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$second[nAuthors]</b><br>
		<font color = 'white'>$second[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
$books3 = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '5'");
$rows = mysqli_num_rows($books3);
$cols = mysqli_num_fields($books3);
$third = mysqli_fetch_array($books3);
if($third != FALSE){
	echo "<fieldset><legend>$third[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$third[nAuthors]</b><br>
		<font color = 'white'>$third[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
$books4 = mysqli_query($conn, "SELECT * FROM books WHERE idBooks = '6'");
$rows = mysqli_num_rows($books4);
$cols = mysqli_num_fields($books4);
$fourth = mysqli_fetch_array($books4);
if($fourth != FALSE){
	echo "<fieldset><legend>$fourth[noBooks]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><b>$fourth[nAuthors]</b><br>
		<font color = 'white'>$fourth[dBooks]</font></p></fieldset>";
	}
	else{
		echo "";
}
echo "<div class = 'mdl'><font color = 'white'>1 &ensp; <a href = 'http://horrorlibrary/Books2.php' target = '_self'> 2 </a></font></div>";
include 'DownPanel.php';
?>
</body>
</html>