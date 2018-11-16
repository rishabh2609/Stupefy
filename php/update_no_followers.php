<?php
	include 'connection.php';

	$uname = $_SESSION["uname"];

	$sql = "SELECT * FROM user_profile_details WHERE username='$uname'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	$_SESSION["no_follow"] = $row["no_follow"];
?>