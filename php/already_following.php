<?php
	session_start();
?>
<?php
	$q = $_REQUEST["q"];

	$uname = $_SESSION["uname"];

	$myfile = fopen("../users/$uname/data/following.json", "r");

	$myJSON = fread($myfile, filesize("../users/$uname/data/following.json"));

	$res = array();
	$res = json_decode($myJSON);

	if(in_array($q, $res)) {
		echo "true";
	}
	else {
		echo "false";
	}

	fclose($myfile);
?>