<?php

$servername = "horrorlibrary";
$dBUsername = "root";
$dBPassword = "";
$dBName = "horrorlibrary";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
	echo "Can not connect to DB Server";
	exit();
}
?>