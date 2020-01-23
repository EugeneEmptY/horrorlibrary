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

if(isset($_POST['searchbyauthor-submit'])){
	$search = mysqli_real_escape_string($conn, $_POST['searchByAuth']);
	$sql = "SELECT * FROM books WHERE nAuthors LIKE '%$search%'";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);
	
	echo "<fieldset><div class = mdl>There are ".$queryResult." results!</div></fieldset>";
	
	if($queryResult > 0){
		while ($row = mysqli_fetch_assoc($result)){
			echo "<fieldset><legend>".$row[noBooks]."</legend><p>
			<div class = rht>".$row[pBooks]."There must be a picture, but i don't know, how to upload it
			</div><b>".$row[dBooks]."</b><br>
			<font color = 'white'>".$row[nAuthors]."</font></p></fieldset>";
		}
	}
	else{
		echo "<fieldset><div class = mdl>There are no results matching your search!</div></fieldset>";
	}
}
if(isset($_POST['searchbybooktitle-submit'])){
	$search = mysqli_real_escape_string($conn, $_POST['searchByBT']);
	$sql = "SELECT * FROM books WHERE noBooks LIKE '%$search%'";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);
	
	echo "<fieldset><div class = mdl>There are ".$queryResult." results!</div></fieldset>";
	
	if($queryResult > 0){
		while ($row = mysqli_fetch_assoc($result)){
			echo "<fieldset><legend>".$row[noBooks]."</legend><p>
			<div class = rht>".$row[pBooks]."There must be a picture, but i don't know, how to upload it
			</div><b>".$row[dBooks]."</b><br>
			<font color = 'white'>".$row[nAuthors]."</font></p></fieldset>";
		}
	}
	else{
		echo "<fieldset><div class = mdl>There are no results matching your search!</div></fieldset>";
	}
}

include 'DownPanel.php';
?>
</body>
</html>