<!DOCTYPE html>
<html>
<head>
	<title> Videos </title>
</head>
<body>

<?php
$db = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");
	$sql = "SELECT * FROM videos";
	$result = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_array($result)){
		$id = $row['id'];
		$name = $row['name'];

		echo "<a href ='Watch.php?id=$id'>$name</a><br />";
	}

?>
</body>
</html>