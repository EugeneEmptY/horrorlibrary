<?php
if(isset($_POST['signup-submit'])){
	
	include "dbh.inc.php";

	$error = NULL;

	$username = $_POST['uid'];
	$email = $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];

	if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../signup.php?error=invalidmailuid");
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
	else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../signup.php?error=invaliduid&mail=".$email);
		exit();
	}
	else if($password !== $passwordRepeat){
		header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=".$email);
		exit();
	}
	else{
		$sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();			
		} 
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../signup.php?error=usertaken&mail=".$email);
				exit();			
			}
			else{
				$vKey = md5(time().$username);
				$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, vKey) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../signup.php?error=sqlerror");
					exit();	
				}
				else{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $vKey);
					mysqli_stmt_execute($stmt);
					header("Location: ../Thanks.php?signup=success"); 
					exit();	
				}
				
			}
		}
		
	}
	/*if (strlen($username) < 5){
		$error = "<p>Your username must be at least 5 characters</p>";
	}
	else{
		$username = $conn->real_escape_string($username);
		$email = $conn->real_escape_string($email);
		$password = $conn->real_escape_string($password);
		$passwordRepeat = $conn->real_escape_string($passwordRepeat);
$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $vKey);
					mysqli_stmt_execute($stmt);
					$to = $email;
					$subject = "Email Verification";
					$message = "<a href = 'http://horrorlib.local/signup.php?vKey = $vKey>Register account</a>";
					$headers = "From: qwerty34343412@gmail.com \r \n";
					$headers .= "MIME-Version: 1.0" . "\r \n";
					$headers .= "Content-type:text/html;charset-UTF-8" . "\r \n";

					mail($to, $subject, $message, $headers);
		if($sql){
			//Send Mail
			/*$to = $email;
			$subject = "Email Verification";
			$message = "<a href = 'http://horrorlib.local/signup.php?vKey = $vKey>Register account</a>";
			$headers = "From: qwerty34343412@gmail.com \r \n";
			$headers .= "MIME-Version: 1.0" . "\r \n";
			$headers .= "Content-type:text/html;charset-UTF-8" . "\r \n";

			mail($to, $subject, $message, $headers);

			header("Location: ../Thanks.php");

		}
		else{
			header("Location: ../signup.php?error=sqlerror");
			exit();	
		}
	}*/
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();	
}
?>