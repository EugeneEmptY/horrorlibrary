<?php
	$msg = "";
	if(isset($_POST['upload'])){

		$target = "uploads/".basename($_FILES['image']['name']);

		$db = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");

		$image = $_FILES['image']['name'];
		$text = $_POST['text'];

		$sql = "INSERT INTO files (image, text) VALUES ('$image', '$text')";

		mysqli_query($db, $sql);

		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			$msg = "Image uploaded successfully";
		}
		else{
			$msg = "There was a problem uploading file";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Image Upload</title>
	<LINK REL = "Stylesheet" HREF = "style.css" TYPE = "text/css">
</head>
<body>
<div id = "content">
<?php
	$db = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");
	$sql = "SELECT * FROM files";
	$result = mysqli_query($db, $sql);
	while ($row = mysqli_fetch_array($result)){
		echo "<div id = 'img_div'>";
		echo "<img src ='uploads/".$row['image']."'>";
		echo "<p>".$row['text']."</p>";
		echo "</div>";
	}
?>

	<form method = "POST" action = "FileAdd.php" enctype = "multipart/form-data"> 
		<input type = "hidden" name = "size" value = "1000000">
		<div>
			<input type = "file" name = "image">
		</div>
		<div>
			<textarea name = "text" cols = "48" rows = "4" placeholder = "Say smthg..."></textarea>
		</div>
		<div>
			<input type = "submit" name = "upload" value = "Upload image">
		</div>
		</form>

</body>
</html>


