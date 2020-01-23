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
echo "<fieldset><div class = mdl><legend><h1>Users table</h1></div></legend>";

echo "<table border = 1 width = 100% bgcolor = gold align = center>";
echo "<tr><td align = center>User ID</td>";
echo "<td align = center>User login</td>";
echo "<td align = center>User e-mail</td>";
echo "<td align = center>User access level</td></tr>";

$usersTB = mysqli_query($conn, "SELECT * FROM users");
$rows = mysqli_num_rows($usersTB);
$cols = mysqli_num_fields($usersTB);
for ($i = 0; $i < $rows; $i++){
	echo "<tr>";
	$users = mysqli_fetch_array($usersTB);
	echo "<td bgcolor = 'white' align = center>$users[idUsers]</td>";
	echo "<td bgcolor = 'white' align = center>$users[uidUsers]</td>";
	echo "<td bgcolor = 'white' align = center>$users[emailUsers]</td>";
	echo "<td bgcolor = 'white' align = center>$users[alUsers]</td>";
	echo "</tr>";
}
echo "</table></fieldset>";
echo "</body></html>";
include 'DownPanel.php';
?>
</body>
</html>