<?php
include 'connection.php';

$uname = $_POST['uname'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM user_sign_in WHERE username='$uname' AND password = '$pass'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
	include 'session_set.php';
	include 'cookie_set.php';
	header("Location: ../profile.php");
}
else {
	header("Location: ../index.php?q=$uname" );
}

$conn->close();

?>