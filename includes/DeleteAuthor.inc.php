<?php
if(isset($_POST['authordeletion-submit'])){
	
	include "dbh.inc.php";
	
	$aName = $_POST['aName'];
	
	if(empty($aName)){
		header("Location: ../dAuthor.php?error=emptyfields");
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $aName)){
		header("Location: ../dAuthor.php?error=invalidauthorname");
		exit();
	}
	else{
		$sql = "SELECT nAuthors FROM authors WHERE nAuthors = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../dAuthor.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $aName);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck == 0){
				header("Location: ../dAuthor.php?error=authordoesntexist");
				exit();			
			}
			else{
				$sql = "DELETE FROM authors WHERE nAuthors = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../dAuthor.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "s", $aName);
					mysqli_stmt_execute($stmt);
					header("Location: ../dAuthor.php?deletion=success");
					exit();	
				}
				
			}
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../dAuthor.php");
	exit();	
}
?>	