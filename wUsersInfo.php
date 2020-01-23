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
echo "<fieldset><div class = mdl><legend><h1>Users info table</h1></div></legend>";

echo "<table border = 1 width = 100% bgcolor = gold align = center>";
echo "<tr><td align = center>User login</td>";
echo "<td align = center>User name</td>";
echo "<td align = center>User surname</td>";
echo "<td align = center>Taken book</td>";
echo "<td align = center>Book author</td>";
echo "<td align = center>Return date</td></tr>";

$usersInfTB = mysqli_query($conn, "SELECT * FROM usersinfo");
$rows = mysqli_num_rows($usersInfTB);
$cols = mysqli_num_fields($usersInfTB);
for ($i = 0; $i < $rows; $i++){
	echo "<tr>";
	$userInfo = mysqli_fetch_array($usersInfTB);
	echo "<td bgcolor = 'white' align = center>$userInfo[uidUsers]</td>";
	echo "<td bgcolor = 'white' align = center>$userInfo[nUsers]</td>";
	echo "<td bgcolor = 'white' align = center>$userInfo[sUsers]</td>";
	echo "<td bgcolor = 'white' align = center>$userInfo[idBooks]</td>";
	echo "<td bgcolor = 'white' align = center>$userInfo[idAuthors]</td>";
	echo "<td bgcolor = 'white' align = center>$userInfo[retDate]</td>";
	echo "</tr>";
}
echo "</table></fieldset>";
echo "</body></html>";
include 'DownPanel.php';
?>
</body>
</html>