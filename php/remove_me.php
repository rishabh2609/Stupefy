
<?php
	#remove this file in final
	session_start();
?>
<?php
	include 'connection.php';
	$uname = $_SESSION["uname"];
	echo $uname;
	$sql = "DELETE FROM user_sign_in WHERE username='$uname'";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} 
	else {
	echo "Error deleting record: " . $conn->error;
	}

	$sql = "DELETE FROM user_profile_details WHERE username='$uname'";
	if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} 
	else {
	echo "Error deleting record: " . $conn->error;
	}

?>
<?php
if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', null, -1, '/');
}
?>
<?php
	session_unset(); 
	session_destroy(); 
?>
<?php
	header("Location: ../index.php");
?>