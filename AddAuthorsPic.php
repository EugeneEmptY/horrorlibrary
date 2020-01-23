<?php
	$msg = "";
	if(isset($_POST['autorpicinsertion-submit'])){
		include 'includes/dbh.inc.php';

		$target = "uploads/".basename($_FILES['image']['name']);

		$image = $_FILES['image']['name'];
		$authorName = $_POST['authorName'];

		$sql = "UPDATE authors SET pAuthors = '$image' WHERE nAuthors = '$authorName'";

		mysqli_query($conn, $sql);
		header("Location: AddAuthors.php?uploaded=success");

		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			$msg = "Image uploaded successfully";
		}
		else{
			$msg = "There was a problem uploading file";
		}
	}
?>