<?php
if(isset($_POST['authordeletion-submit'])){
	
	include "dbh.inc.php";
	
	$bTitle = $_POST['bTitle'];
	
	if(empty($bTitle)){
		header("Location: ../dBook.php?error=emptyfields");
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $bTitle)){
		header("Location: ../dBook.php?error=invalidbooktitle");
		exit();
	}
	else{
		$sql = "SELECT noBooks FROM books WHERE noBooks = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../dBook.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $bTitle);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck == 0){
				header("Location: ../dBook.php?error=bookdoesntexist");
				exit();			
			}
			else{
				$sql = "DELETE FROM books WHERE noBooks = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../dBook.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "s", $bTitle);
					mysqli_stmt_execute($stmt);
					header("Location: ../dBook.php?deletion=success");
					exit();	
				}
				
			}
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../dBook.php");
	exit();	
}
?>	