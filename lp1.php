<html>
	<head>
		<title>LAMP Project 1</title>
		<link rel="STYLESHEET" href="main.css" type="text/css">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	</head>
	<body>

<?php
	require('common.php');
	require('conf.php');
	$link = mysql_connect($DBSERVER, $DBUSER);
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}	
		
	if (!mysql_select_db($DB)) {
		die('Could not select database: ' . mysql_error());
	}

	// Get version number
	$rs = mysql_query("select version from tGlobalInfo");
	if (!$rs) {
		die('Could not query:' . mysql_error());
	}

	$version = mysql_result($rs, 0);
	echo("<p>Version is: $version</p>\n");

	mysql_close($link);
?>

	</body>
</html>
