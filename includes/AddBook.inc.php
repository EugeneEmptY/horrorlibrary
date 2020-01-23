<?php
if (isset($_POST['bookinsertion-submit'])){
	include 'dbh.inc.php';
	$bookName = $_POST['bookName'];
	$bookDescr = $_POST['bookDescr'];
	$bookPic = $_POST['bookPic'];
	$bookAuthor = $_POST['bookAuthor'];
	if(empty($bookName) || empty($bookDescr) || empty($bookPic) || empty($bookAuthor)){
		header("Location: ../AddBook.php?error=emptyfields");
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $bookAuthor) && !preg_match("/^[a-zA-Z0-9 ]*$/", $bookName)){
		header("Location: ../AddBook.php?error=invalidauthornameandbookname");
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $bookName)){
		header("Location: ../AddBook.php?error=invalidbookname");
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $bookAuthor)){
		header("Location: ../AddBook.php?error=invalidauthorname");
		exit();
	}
	else{
		$sql = "SELECT noBooks FROM books WHERE noBooks = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../AddBook.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $bookName);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../AddBook.php?error=bookalreadyexist&bookName=".$bookName);
				exit();			
			}
			else{
				$sql = "INSERT INTO books (noBooks, dBooks, pBooks, nAuthors) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../AddBook.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "ssss", $bookName, $bookDescr, $bookPic, $bookAuthor);
					mysqli_stmt_execute($stmt);
					header("Location: ../AddBook.php?insertion=success");
					exit();	
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../AddBook.php");
	exit();	
}
?>