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
		echo "<form action = 'AuthorSearch.php' method = 'post'>
		<fieldset><div class = mdl>Search: <input type = 'text' name = 'search' placeholder = 'Enter author name'>
		<button type = 'submit' name = 'searchauthor-submit'>Ok</button></form>&#8195;
		<a href = 'AddAuthors.php'><font color = 'yellow'>Add author</font></a></div></fieldset>";
	} else if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] != '2') {
		echo "<form action = 'AuthorSearch.php' method = 'post'>
		<div class = mdl><fieldset>Search: <input type = 'text' name = 'search' placeholder = 'Enter author name'>
		<button type = 'submit' name = 'searchauthor-submit'>Ok</button></fieldset></div></form>";
	}
}
/*$db = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");*/
	$sql = "SELECT * FROM authors";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)){
		echo "<fieldset><legend>".$row['nAuthors']."</legend><p>";
		echo "<div class = rht><img src ='uploads/".$row['pAuthors']."'>";
		echo "<p>".$row['bioAuthors'];
		echo "</p></fieldset>";
	}
/*$authors = mysqli_query($conn, "SELECT * FROM authors WHERE idAuthors = '1'");
$rows = mysqli_num_rows($authors);
$cols = mysqli_num_fields($authors);
$first = mysqli_fetch_array($authors);
if($first != FALSE){
	echo "<fieldset><legend>$first[nAuthors]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><font color = 'white'>$first[bioAuthors]
		</font></p></fieldset>";
}
	else{
		echo "";
}
$authors2 = mysqli_query($conn, "SELECT * FROM authors WHERE idAuthors = '2'");
$rows = mysqli_num_rows($authors2);
$cols = mysqli_num_fields($authors2);
$second = mysqli_fetch_array($authors2);
if($second != FALSE){
	echo "<fieldset><legend>$second[nAuthors]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><font color = 'white'>$second[bioAuthors]
		</font></p></fieldset>";
	}
	else{
		echo "";
}
$authors3 = mysqli_query($conn, "SELECT * FROM authors WHERE idAuthors = '3'");
$rows = mysqli_num_rows($authors3);
$cols = mysqli_num_fields($authors3);
$third = mysqli_fetch_array($authors3);
if($third != FALSE){
	echo "<fieldset><legend>$third[nAuthors]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><font color = 'white'>$third[bioAuthors]
		</font></p></fieldset>";
	}
	else{
		echo "";
}
$authors4 = mysqli_query($conn, "SELECT * FROM authors WHERE idAuthors = '4'");
$rows = mysqli_num_rows($authors4);
$cols = mysqli_num_fields($authors4);
$fourth = mysqli_fetch_array($authors4);
if($fourth != FALSE){
	echo "<fieldset><legend>$fourth[nAuthors]</legend><p>";
	echo "<div class = rht>There must be a picture, but i don't know, how to upload it";
	echo "</div><font color = 'white'>$fourth[bioAuthors]
		</font></p></fieldset>";
	}
	else{
		echo "";
}*/
include 'DownPanel.php';
?>
</body>
</html>

<?php
	
?>