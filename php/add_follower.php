<?php
	session_start();
?>
<?php

	$q = $_REQUEST["q"];

	$myuname = $_SESSION["uname"];

	$follow_uname = $q;

	#add to my following list
	$myfile = fopen("../users/$myuname/data/following.json", "r");

	$myJSON = fread($myfile, filesize("../users/$myuname/data/following.json"));

	$res = array();
	$res = json_decode($myJSON);

	array_push($res, $follow_uname);

	fclose($myfile);
	$myfile = fopen("../users/$myuname/data/following.json", "w");

	$myJSON = json_encode($res);
	fwrite($myfile, $myJSON);
	fclose($myfile);

	#add to that users followed list
	$myfile = fopen("../users/$follow_uname/data/followedby.json", "r");

	$myJSON = fread($myfile, filesize("../users/$follow_uname/data/followedby.json"));

	$res = array();
	$res = json_decode($myJSON);

	array_push($res, $myuname);

	fclose($myfile);
	$myfile = fopen("../users/$follow_uname/data/followedby.json", "w");

	$myJSON = json_encode($res);
	fwrite($myfile, $myJSON);
	fclose($myfile);

	include 'connection.php';

	$sql = "SELECT * FROM user_profile_details WHERE username='$follow_uname'";

	$res = $conn->query($sql);

	$row = $res->fetch_assoc();
	$no_follow = $row["no_follow"];

	$no_follow = $no_follow + 1;
	$sql = "UPDATE user_profile_details SET no_follow=$no_follow WHERE username='$follow_uname'";

	if ($conn->query($sql) === TRUE) {
		echo "success";
	    
	} else {
	    echo "Error";
	}

	$conn->close();	
?>