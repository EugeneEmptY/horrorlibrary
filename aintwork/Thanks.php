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
echo "<fieldset><div class = mdl><font color = 'yellow'>Thanks you for register.</font></div></fieldset>";
echo "<a href = 'http://horrorlib.ru/'><p class = 'mdl'><img src = 'images/HLlogo.png' WIDTH = '305' HEIGHT = '136' ALT = 'HLLogo'></p></a>";

include 'DownPanel.php';
?>
</body>
</html>