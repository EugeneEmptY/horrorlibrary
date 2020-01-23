<?php
include 'includes/dbh.inc.php';

if(isset($_POST['Upload']) && $_POST['Upload']=="Upload Audio"){
	$dir = 'uploads/';
	$audio_path = $dir.basename($_FILES['audioFile']['name']); 

	if(move_uploaded_file($_FILES['audioFile']['tmp_name'], $audio_path)){
		echo "Uploaded successfully";

		saveAudio($audio_path);

		displayAudios();
	}
}
function displayAudios(){
	$db = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");
	$sql = "SELECT * FROM audio";

	$result = mysqli_query($db, $sql);

	while($row = mysqli_fetch_array($result)){
		echo '<a href = "Audios.php?name='.$row['name'].'">'.$row['name']."</a>";
		echo "<br />";
	}
}

function saveAudio($fileName){
	$conn = mysqli_connect("horrorlibrary", "root", "", "horrorlibrary");
	$query = "INSERT INTO audio (name) VALUES ('$fileName')";
	mysqli_query($conn, $query);

	if(mysqli_affected_rows($conn)>0){
		echo " audio file path saved in db<br />";
	}
}

?>