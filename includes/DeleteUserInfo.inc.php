<?php
if(isset($_POST['userinfodeletion-submit'])){
	include "dbh.inc.php";
	$usur = $_POST['usur'];
	if(empty($usur)){
		header("Location: ../dUserInfo.php?error=emptyfields");
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $usur)){
		header("Location: ../dUserInfo.php?error=invalidsurname");
		exit();
	}
	else{
		$sql = "SELECT sUsers FROM usersinfo WHERE sUsers = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../dUserInfo.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $usur);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck == 0){
				header("Location: ../dUserInfo.php?error=userdoesntexist");
				exit();			
			}
			else{
				$sql = "DELETE FROM usersinfo WHERE sUsers = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../dUserInfo.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "s", $usur);
					mysqli_stmt_execute($stmt);
					header("Location: ../dUserInfo.php?deletion=success");
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