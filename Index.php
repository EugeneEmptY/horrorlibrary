<?php
	include 'sesop.php';
?>
<html>
<head>
<title>
Horror Library
</title>
<LINK REL = "Stylesheet" HREF = "mainstyle.css" TYPE = "text/css">
<style>
fieldset{
	border: solid 2px #F00;
	background: #000;
	opacity: 0.75;
	margin-top: 10px;
	color: yellow;
}
.mdl{
	text-align: center;
	margin-bottom: 0px;
}
</style>
</head>
<body>
<?php
include 'PanelBGandLogo.php';
include 'SidePanelsForAds.php';
include 'includes/dbh.inc.php';
if(isset($_SESSION['userId'])){
	echo "<div class = mdl><fieldset>You are logged in as ".$_SESSION['userUid']."</fieldset></div>";
}
else{
	echo "<div class = mdl><fieldset>You are guest! Please log in or create a new account!</fieldset></div><br>";
}
if (isset($_SESSION['userUid']) && isset($_SESSION['accessLevel'])) {
	mysqli_query($conn, "SELECT alUsers FROM users WHERE uidUsers=".$_SESSION['userUid']);
	if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] == '2') {
		echo "<fieldset><a href = 'FileAdd.php'><font color = 'yellow'>Add File</font></a></fieldset><br>";
		echo "<fieldset><a href = 'VideoAdd.php'><font color = 'yellow'>Add Video</font></a></fieldset><br>";
		echo "<fieldset><a href = 'AddAudio.php'><font color = 'yellow'>Add Audio</font></a></fieldset><br>";
	}else if (isset($_SESSION['accessLevel']) && $_SESSION['accessLevel'] != '2') {
		
	}
}



/*$url = 'https://www.youtube.com/watch?v=9gsAz6S_zSw';
 
$parsed_url = parse_url($url);
parse_str($parsed_url['query'], $parsed_query);
echo '<iframe src="http://www.youtube.com/embed/' . $parsed_query['v'] . '" type="text/html" width="400" height="300" frameborder="0"></iframe> &#8195; &#8195;	&#8195;	&#8195; &#8194;';

$url = 'https://www.youtube.com/watch?v=6fVE8kSM43I';
 
$parsed_url = parse_url($url);
parse_str($parsed_url['query'], $parsed_query);
echo '<iframe src="http://www.youtube.com/embed/' . $parsed_query['v'] . '" type="text/html" width="400" height="300" frameborder="0"></iframe>';

$url = 'https://www.youtube.com/watch?v=5abamRO41fE';
 
$parsed_url = parse_url($url);
parse_str($parsed_url['query'], $parsed_query);
echo '<iframe src="http://www.youtube.com/embed/' . $parsed_query['v'] . '" type="text/html" width="400" height="300" frameborder="0"></iframe> &#8195; &#8195;	&#8195;	&#8195; &#8194;';

$url = 'https://www.youtube.com/watch?v=067YF8KHdTM';
 
$parsed_url = parse_url($url);
parse_str($parsed_url['query'], $parsed_query);
echo '<iframe src="http://www.youtube.com/embed/' . $parsed_query['v'] . '" type="text/html" width="400" height="300" frameborder="0"></iframe>';*/
include 'DownPanel.php';
?>
</body>
</html>