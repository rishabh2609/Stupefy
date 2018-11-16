<?php
include 'connection.php';

$q = $_REQUEST["q"];

$sql = "SELECT * FROM user_sign_in WHERE username='$q'";
$result = $conn->query($sql);

if ($result->num_rows >= 1) {
	echo "Username already exists";
}
else {
	echo "";
}

$conn->close();

?>