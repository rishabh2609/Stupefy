<?php
	session_start();
?>
<?php
	include 'connection.php';
	$q = $_REQUEST["q"];

	$hint = "";

	$q = ucwords(strtolower($q));

	$sql = "SELECT * FROM user_profile_details";
	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$len = strlen($q);
			if( stristr( $q, substr( $row["name"], 0 ,$len ) ) ) {
				$name = $row["name"];
				$uname = $row["username"];
				$action = "viewprofile.php?q=$uname";
				$hint = $hint . "<a href='$action' style='color: black !important;'><h5 style='cursor: pointer; margin-top: 20px; margin-bottom:20px;'>$name<small>(@$uname)</small></h5></a>";
			}

		}
	}
	if($hint == "") {
		echo "No user found!";
	}
	else {
		echo $hint;
	}

?>