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
echo "</fieldset></div>";
include 'includes/dbh.inc.php';

$userUid = $_SESSION['userUid'];

echo "<html><body>";
echo "<fieldset><font color = 'yellow'><div class = mdl><legend>".$userUid;
echo " info</legend></div></font></a>";
echo "<table border = 1 width = 100% bgcolor = gold align = center>";
echo "<tr><td align = center>User name</td>";
echo "<td align = center>User Surname</td>";
echo "<td align = center>Book title</td>";
echo "<td align = center>Book id</td>";
echo "<td align = center>Author name</td>";
echo "<td align = center>Return date</td></tr>";

$bookTitle = "SELECT books.noBooks FROM books, usersinfo WHERE books.idBooks = usersinfo.idBooks AND usersinfo.uidUsers = '$userUid'";
$bookTitleForTB = mysqli_query($conn, $bookTitle);
$rows = mysqli_num_rows($bookTitleForTB);
$cols = mysqli_num_fields($bookTitleForTB);
$bookTFTB = mysqli_fetch_array($bookTitleForTB);

$authorName = "SELECT authors.nAuthors FROM authors, usersinfo WHERE authors.idAuthors = usersinfo.idAuthors AND usersinfo.uidUsers = '$userUid'";
$authorNameForTB = mysqli_query($conn, $authorName);
$rows = mysqli_num_rows($authorNameForTB);
$cols = mysqli_num_fields($authorNameForTB);
$authorNFTB = mysqli_fetch_array($authorNameForTB);

$sql = "SELECT * FROM usersinfo WHERE uidUsers = '$userUid'";
$userInfoTB = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($userInfoTB);
$cols = mysqli_num_fields($userInfoTB);
$user = mysqli_fetch_array($userInfoTB);
if ($user != FALSE && $bookTFTB > 0 && $authorNFTB > 0){
	echo "<tr>";
		echo "<td bgcolor = 'white' align = center>".$user[nUsers]."</td>";
		echo "<td bgcolor = 'white' align = center>".$user[sUsers]."</td>";
		echo "<td bgcolor = 'white' align = center>".$bookTFTB[noBooks]."</td>";
		echo "<td bgcolor = 'white' align = center>".$user[idBooks]."</td>";
		echo "<td bgcolor = 'white' align = center>".$authorNFTB[nAuthors]."</td>";
		echo "<td bgcolor = 'white' align = center>".$user[retDate]."</td>";
		echo "</tr>";

echo "</table></fieldset>";
echo "</body></html>";
}
include 'DownPanel.php';
?>
</body>
</html>