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
				$hint = $hint . "<h5 onclick='change_val_bar(this)' style='cursor: pointer; margin-top: 20px; margin-bottom:20px;'>$name</h5>";
			}

		}
	}
	if($hint == "") {
		echo "No result found!";
	}
	else {
		echo $hint;
	}
?>