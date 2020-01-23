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
echo "<fieldset><div class = mdl><legend><h1>Books table</h1></div></legend>";

echo "<table border = 1 width = 100% bgcolor = gold align = center>";
echo "<tr><td align = center>Book ID</td>";
echo "<td align = center>Book title</td>";
echo "<td align = center>Book description</td>";
echo "<td align = center>Book cover</td>";
echo "<td align = center>Book author</td></tr>";

$booksTB = mysqli_query($conn, "SELECT * FROM books");
$rows = mysqli_num_rows($booksTB);
$cols = mysqli_num_fields($booksTB);
for ($i = 0; $i < $rows; $i++){
	echo "<tr>";
	$book = mysqli_fetch_array($booksTB);
	echo "<td bgcolor = 'white' align = center>$book[idBooks]</td>";
	echo "<td bgcolor = 'white' align = center>$book[noBooks]</td>";
	echo "<td bgcolor = 'white' align = center>$book[dBooks]</td>";
	echo "<td bgcolor = 'white' align = center>$book[pBooks]</td>";
	echo "<td bgcolor = 'white' align = center>$book[nAuthors]</td>";
	echo "</tr>";
}
echo "</table></fieldset>";
echo "</body></html>";
include 'DownPanel.php';
?>
</body>
</html>