<?php
if(isset($_POST['userdeletion-submit'])){
	
	include "dbh.inc.php";
	
	$login = $_POST['uid'];
	
	if(empty($login)){
		header("Location: ../dUser.php?error=emptyfields");
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $login)){
		header("Location: ../dUser.php?error=invaliduid");
		exit();
	}
	else{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../dUser.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $login);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck == 0){
				header("Location: ../dUser.php?error=userdoesntexist");
				exit();			
			}
			else{
				$sql = "DELETE FROM users WHERE uidUsers = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../dUser.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "s", $login);
					mysqli_stmt_execute($stmt);
					header("Location: ../dUser.php?deletion=success");
					exit();	
				}
				
			}
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../dUser.php");
	exit();	
}
?>