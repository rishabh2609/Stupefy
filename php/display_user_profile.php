<?php
	$q = $_REQUEST["q"];
	
	if($q == $_SESSION["uname"]) {
		header('Location: profile.php');
	}

	include 'connection.php';

	$sql = "SELECT * FROM user_profile_details WHERE username = '$q'";
	$result = $conn->query($sql);

	if($result->num_rows == 0) {
		header('location: profile.php');
	}
	else {
		$row = $result->fetch_assoc();
		$uname = $q;
		$name = $row["name"];
		$profile_pic_url = $row["profile_pic_url"];
		$no_follow = $row["no_follow"];
		$no_pictures = $row["no_pictures"];
		$status = $row["status"];
	}


	$conn->close();
?>