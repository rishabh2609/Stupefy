<?php
	include 'connection.php';
	$uname = $_COOKIE["user"];
	$sql = "SELECT * FROM user_sign_in WHERE username='$uname'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		include 'session_set.php';
		include 'cookie_set.php';
		header("Location: ../profile.php");
	}

	$conn->close();

?>