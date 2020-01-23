<?php
if(isset($_POST['userinsertion-submit'])){
	
	include "dbh.inc.php";
	
	$login = $_POST['uid'];
	$mail = $_POST['mail'];
	$password = $_POST['pwd'];
	$userAccessLevel = $_POST['ual'];
	
	if(empty($login) || empty($mail) || empty($password) || empty($userAccessLevel)){
		header("Location: ../aUser.php?error=emptyfields&uid=".$login."&mail=".$mail);
		exit();
	}
	else if(!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9 ]*$/", $login)){
		header("Location: ../aUser.php?error=invalidmailuid");
		exit();
	}
	else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		header("Location: ../aUser.php?error=invalidmail&uid=".$login);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $login)){
		header("Location: ../aUser.php?error=invaliduid&mail=".$mail);
		exit();
	}
	else if($userAccessLevel != (1 or 2)){
		header("Location: ../aUser.php?error=invalidaccesslevel&uid=".$login."&mail=".$mail);
		exit();
	}
	else{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../aUser.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $login);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../aUser.php?error=usertaken&mail=".$mail);
				exit();			
			}
			else{
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, alUsers) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../aUser.php?error=sqlerror");
					exit();	
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssss", $login, $mail, $hashedPwd, $userAccessLevel);
					mysqli_stmt_execute($stmt);
					header("Location: ../aUser.php?insertion=success");
					exit();	
				}
				
			}
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../aUser.php");
	exit();	
}
?>