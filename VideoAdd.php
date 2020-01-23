<?php
 	
$db = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");

if(isset($_POST['submit'])){

	$name = $_FILES['file']['name'];
	$temp = $_FILES['file']['tmp_name'];

	move_uploaded_file($temp, "uploads/".$name);
	$url = "uploads/$name";
	$sql = "INSERT INTO videos (name, url) VALUES ('$name', '$url')";
	mysqli_query($db, $sql);
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Video Upload</title>
</head>
<body>

<a href="Videos.php">Videos</a>

<form action = "VideoAdd.php" method = "POST" enctype="multipart/form-data">
	<input type = "file" name = "file">
	<input type = "submit" name = "submit" value = "Upload">
</form>

<?php

if(isset($_POST['submit'])){

	echo "<br />".$name." has been uploaded";
}

?>


</body>
</html>