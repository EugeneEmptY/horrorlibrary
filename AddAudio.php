<?php
include 'includes/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Audio uploading</title>
</head>
<body>
<form action = "audioUpload.php" method = "POST" enctype="multipart/form-data">
<input type = "file" name = "audioFile" value = "1000000">
<input type = "submit" value = "Upload Audio" name = "Upload">

</form>
</body>
</html>