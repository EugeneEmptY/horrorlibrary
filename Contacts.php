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
</style>
</head>
<body>
<?php
include 'PanelBGandLogo.php';
include 'SidePanelsForAds.php';
echo "<fieldset><legend><b>Contact info</b></legend><p>
                <font color = 'white'><img src = 'http://horrorlibrary/images/Twitter.png' align = 'left' height = '64' width = '64'><a href = 'https://twitter.com/'><font size = '24'>Our twitter page</font></a><br><br>
                <font color = 'white'><img src = 'http://horrorlibrary/images/Reddit.png' align = 'left' height = '64' width = '64'><a href = 'https://reddit.com/'><font size = '24'>Our reddit trad</font></a><br><br>
                <font color = 'white'><img src = 'http://horrorlibrary/images/Phone.png' align = 'left' height = '64' width = '64'><font size = '24'>000-000-000-0</font><br><br>
                <font color = 'white'><img src = 'http://horrorlibrary/images/Phone.png' align = 'left' height = '64' width = '64'><font size = '24'>888-888-888-8</font><br>
            </font></p></fieldset>";
include 'DownPanel.php';
?>
</body>
</html>