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
	else if($_GET['error'] == "invalidauthornameandbookname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid author name and book title!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidbookname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid book title!</font></fieldset></div>";
	}
	else if($_GET['error'] == "invalidauthorname"){
		echo "<div class = mdl><fieldset><font color = red>Invalid author name!</font></fieldset></div>";
	}
	else if($_GET['error'] == "bookalreadyexist"){
		echo "<div class = mdl><fieldset><font color = red>Book is already exists!</font></fieldset></div>";
	}
}
else if($_GET['insertion'] == "success"){
	echo "<div class = mdl><fieldset><font color = green>Added successfully!</font></fieldset></div>";
}
echo "<div class = mdl><fieldset><legend><h1>Book insertion</h1></legend>
	<form action = 'includes/AddBook.inc.php' method = 'POST' enctype = 'multipart/form-data'>
	Enter book title: <br><input type = 'text' name = 'bookName' placeholder = 'Title of the book'><br><br>
	Enter short description of the book: <br><textarea cols = '25' rows = '5' name ='bookDescr' placeholder = 'Book description'></textarea><br><br>
	Upload book cover here: <br><input type = 'hidden' name = 'bookPic' value = '51200'><input type = 'file' name = 'bookPic'><br><br>
	Type this book author name: <br><input type = 'text' name = 'bookAuthor' placeholder = 'Book Author'><br><br>
	<button type = 'submit' name = 'bookinsertion-submit'>Add book</button></fieldset></div></form>";

/*
<form action = 'upload.php' method = 'POST' enctype = 'multipart/form-data'> 
		<input type = 'file' name = 'file'><br>
		<button type = 'submit name = 'submit'>Upload</button>
		</form>
*/

include 'DownPanel.php';
?>
</body>
</html>