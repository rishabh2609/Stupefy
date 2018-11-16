<?php
session_start();
?>

<?php
include 'connection.php';

$q = $_REQUEST["q"];
$uname = $_SESSION["uname"];

$sql = "UPDATE user_profile_details SET status='$q' WHERE username='$uname'";

if ($conn->query($sql) === TRUE) {
    echo "Status updated successfully!";
    $sql = "SELECT * FROM user_profile_details WHERE username='$uname'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$_SESSION["status"] = $row["status"];
} else {
    echo "Error updating status";
}

$conn->close();

?>