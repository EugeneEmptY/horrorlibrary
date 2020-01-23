<?php
if (isset($_POST['authorinsertion-submit'])){
	include 'dbh.inc.php';
	
	$authorName = $_POST['authorName'];
	$authorBio = $_POST['authorBio'];
	if(empty($authorName) || empty($authorBio)){
		header("Location: ../AddAuthors.php?error=emptyfields");
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $authorName)){
		header("Location: ../AddAuthors.php?error=invalidauthorname");
		exit();
	}
	else{
		$sql = "SELECT nAuthors FROM authors WHERE nAuthors = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../AddAuthors.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $authorName);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../AddAuthors.php?error=authoralreadyexist&authorName=".$authorName);
				exit();			
			}
			else{
				$sql = "INSERT INTO authors (nAuthors, bioAuthors) VALUES (?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../AddAuthors.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "ss", $authorName, $authorBio);
					mysqli_stmt_execute($stmt);
					header("Location: ../AddAuthors.php?insertion=success");
					exit();	
				}
			}
		}
	}
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../AddAuthors.php");
	exit();	
}
?>