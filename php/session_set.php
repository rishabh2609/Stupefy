<?php
	session_start();
?>
<?php
	$_SESSION["uname"] = $uname;
	include 'connection.php';
	$sql = "SELECT * FROM user_profile_details WHERE username='$uname'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION["name"] = $row["name"];
	$_SESSION["profile_pic_url"] = $row["profile_pic_url"];
	$_SESSION["no_follow"] = $row["no_follow"];
	$_SESSION["no_pictures"] = $row["no_pictures"];
	$_SESSION["status"] = $row["status"];

	$conn->close();
?>