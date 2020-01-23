<!DOCTYPE html>
<html>
<head>
	<title> Watch video </title>
</head>
<body>

<?php

$db = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");
if(isset($_GET['id'])){

	$id = $_GET['id'];
	$sql = "SELECT * FROM videos WHERE id = '$id'";
	$result = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_array($result)){
		$name = $row['name'];
		$url = $row['url'];
	}

	echo "You are watching ".$name."<br />";
	echo "<embed src='$url' width = '560' height = '315'></embed>";
}
else{
	echo "Error!";
}

?>

<a href = "Index.php"> Main </a>

</body>
</html>