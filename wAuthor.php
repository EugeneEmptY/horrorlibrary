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
include 'includes/dbh.inc.php';

echo "<html><body>";
echo "<fieldset><div class = mdl><legend><h1>Authors table</h1></div></legend>";

echo "<table border = 1 width = 100% bgcolor = gold align = center>";
echo "<tr><td align = center>Author ID</td>";
echo "<td align = center>Author name</td>";
echo "<td align = center>Author bio</td>";
echo "<td align = center>Author photo</td></tr>";

$authorsTB = mysqli_query($conn, "SELECT * FROM authors");
$rows = mysqli_num_rows($authorsTB);
$cols = mysqli_num_fields($authorsTB);
for ($i = 0; $i < $rows; $i++){
	echo "<tr>";
	$auth = mysqli_fetch_array($authorsTB);
	echo "<td bgcolor = 'white' align = center>$auth[idAuthors]</td>";
	echo "<td bgcolor = 'white' align = center>$auth[nAuthors]</td>";
	echo "<td bgcolor = 'white' align = center>$auth[bioAuthors]</td>";
	echo "<td bgcolor = 'white' align = center>$auth[pAuthors]</td>";
	echo "</tr>";
}
echo "</table></fieldset>";
echo "</body></html>";
include 'DownPanel.php';
?>
</body>
</html>