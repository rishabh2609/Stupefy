<?php
	session_start();
?>
<?php
	include 'connection.php';
	$q = intval($_REQUEST["q"]);
	$sql = "SELECT * FROM user_collections WHERE photo_id=$q";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$num = $row["no_stupefy"];
	$num = $num + 1;
	$uname = $_SESSION["uname"];

	$sql = "UPDATE user_collections SET no_stupefy=$num WHERE photo_id=$q";

	if ($conn->query($sql) === TRUE) {
		echo "success";
	    
	} else {
	    echo "Error";
	}

	#adding to likes.json
		$myfile = fopen("../users/$uname/data/likes.json", "r");

		$myJSON = fread($myfile, filesize("../users/$uname/data/likes.json"));
		$res = array();
		$res = json_decode($myJSON);

		fclose($myfile);

		$myfile = fopen("../users/$uname/data/likes.json", "w") or die("Unable to open file!");

		array_push($res, $q);

		$myJSON = json_encode($res);

		fwrite($myfile, $myJSON);

		fclose($myfile);
	#added to likes.json


$conn->close();

?>