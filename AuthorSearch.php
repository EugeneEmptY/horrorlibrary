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

if(isset($_POST['searchauthor-submit'])){
	$search = mysqli_real_escape_string($conn, $_POST['search']);
	$sql = "SELECT * FROM authors WHERE nAuthors LIKE '%$search%'";
	$result = mysqli_query($conn, $sql);
	$queryResult = mysqli_num_rows($result);
	
	echo "<fieldset><div class = mdl>There are ".$queryResult." results!</div></fieldset>";
	
	if($queryResult > 0){
		while ($row = mysqli_fetch_assoc($result)){
			echo "<fieldset><legend>".$row[nAuthors]."</legend><p>
			<div class = rht>".$row[pAuthors]."There must be a picture, but i don't know, how to upload it
			</div><font color = 'white'>".$row[bioAuthors]."</font><br></p></fieldset>";
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