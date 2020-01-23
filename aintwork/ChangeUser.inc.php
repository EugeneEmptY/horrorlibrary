<?php
if(isset($_POST['change-submit'])){
	
	include 'dbh.inc.php';
	
	$login = $_POST['login'];
	
	if(empty($login)){
		header("Location: ../cUser.php?error=emptyfield");
		exit();
	}
	else{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../cUser.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $login);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck == 0){
				header("Location: ../cUser.php?error=userdoesntexist");
				exit();			
			}
			else{
				header("Location: ../cUser.php?userexist=goon");
				exit();		
			}
		}
	}
}	
?>
<?php
if(isset($_POST['userchange-submit'])){
	
	include "dbh.inc.php";
	
	$login = $_POST['login'];
	$mail = $_POST['e-mail'];
	$alu = $_POST['access'];

	if($_POST['cmail']=='changeMail' && $_POST['cal']=='changeAccessLevel'){
		if(empty($mail) || empty($alu)){
			header("Location: ../cUser.php?error=emptyfields&mail=".$mail."&accesslevel=".$alu);
			exit();
		}
		else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			header("Location: ../cUser.php?error=invalidemail&accesslevel=".$alu);
			exit();
		}
		else if($alu != (1 or 2)){
			header("Location: ../cUser.php?error=invalidaccesslevel&mail=".$mail);
			exit();
		}
		else{
			$sql = "SELECT * FROM users WHERE uidUsers = ?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../cUser.php?error=sqlerror");
				exit();			
			} 
			else{
				mysqli_stmt_bind_param($stmt, "s", $login);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$sql = "UPDATE users SET emailUsers = ?, alUsers = ? WHERE uidUsers = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../cUser.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "sss", $mail, $alu, $login);
					mysqli_stmt_execute($stmt);
					header("Location: ../cUser.php?update=success");
					exit();	
				}
			}
		}	
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	
	if ($_POST['cmail']=='changeMail'){
		if(empty($mail)){
			header("Location: ../cUser.php?error=emptyfield");
			exit();
		}
		else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
			header("Location: ../cUser.php?error=invalidemail");
			exit();
		}
		else{
			$sql = "SELECT * FROM users WHERE uidUsers = ?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../cUser.php?error=sqlerror");
				exit();			
			} 
			else{
				mysqli_stmt_bind_param($stmt, "s", $login);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$sql = "UPDATE users SET emailUsers = ? WHERE uidUsers = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../cUser.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "ss", $mail, $login);
					mysqli_stmt_execute($stmt);
					header("Location: ../cUser.php?update=success");
					exit();	
				}
			}
		}	
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	
	if($_POST['cal']=='changeAccessLevel'){
		if(empty($alu)){
			header("Location: ../cUser.php?error=emptyfield");
			exit();
		}
		else if($alu != (1 or 2)){
			header("Location: ../cUser.php?error=invalidaccesslevel");
			exit();
		}
		else{
			$sql = "SELECT * FROM users WHERE uidUsers = ?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $sql)){
				header("Location: ../cUser.php?error=sqlerror");
				exit();			
			} 
			else{
				mysqli_stmt_bind_param($stmt, "s", $login);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$sql = "UPDATE users SET alUsers = ? WHERE uidUsers = ?";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../cUser.php?error=sqlerror");
					exit();	
				}
				else{
					mysqli_stmt_bind_param($stmt, "ss", $alu, $login);
					mysqli_stmt_execute($stmt);
					header("Location: ../cUser.php?update=success");
					exit();	
				}
			}
		}	
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
}
else{
	header("Location: ../cUser.php");
	exit();	
}
?>