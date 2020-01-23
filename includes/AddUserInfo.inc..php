<?php
if(isset($_POST['userinfoinsertion-submit'])){
	
	include "dbh.inc.php";
	
	$login = $_POST['uid'];
	$name = $_POST['uname'];
	$surname = $_POST['usur'];
	$bookId = $_POST['bookid'];
	$authId = $_POST['authid'];
	$retDate = $_POST['retdate'];
	
	if(empty($login) || empty($name) || empty($surname) || empty($bookId) || empty($authId) || empty($retDate)){
		header("Location: ../aUserInfo.php?error=emptyfields&uid=".$login."&uname=".$name."&surname=".$surname."retdate=".$retDate);
		exit();
	}
	else if(!preg_match("/^[A-Za-z0-9 ]*$/", $name) && !preg_match("/^[a-zA-Z0-9 ]*$/", $surname)){
		header("Location: ../aUserInfo.php?error=invalidnamesurname");
		exit();
	}
	else if (!preg_match("/^[A-Za-z0-9 ]*$/", $name)){
		header("Location: ../aUserInfo.php?error=invalidname&uname=".$name);
		exit();
	}
	else if (!preg_match("/^[A-Za-z0-9 ]*$/", $surname)){
		header("Location: ../aUserInfo.php?error=invalidsurname&usur=".$surname);
		exit();
	}
	else{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../aUserInfo.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $login);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck == 0){
				header("Location: ../aUserInfo.php?error=userdoesntexist&name=".$name."&surname=".$surname);
				exit();			
			}
			else{
				$sql = "INSERT INTO usersinfo (uidUsers, nUsers, sUsers, idBooks, idAuthors, retDate) VALUES (?, ?, ?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../aUserInfo.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "ssssss", $login, $name, $surname, $bookId, $authId, $retDate);
					mysqli_stmt_execute($stmt);
					header("Location: ../aUserInfo.php?insertion=success");
					exit();	
				}
			}
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../aUserInfo.php");
	exit();	
}
?>