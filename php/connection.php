<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stupefy";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn -> connect_error) {
	die("Connection failed");
}
?>