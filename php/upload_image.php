<?php
	session_start();
?>
<?php
	if(!isset($_COOKIE["user"])) {
		header("Location: index.php");
	}
	else {
		if(!array_key_exists('uname', $_SESSION)) {
			header("Location: php/auto_login.php");	
		}
	}
?>
<?php
	$target_dir = "../users/" . $_SESSION["uname"] . "/photos/";
	$target_file = $target_dir . basename($_FILES["file"]["name"]);
	$imageType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	$uname = $_SESSION["uname"];
	$name = $_SESSION["name"];
	// if(isset($_POST["submit"])) {
	// 	$check = getimagesize($_FILES["file"]["tmp_name"]);
	// 	if($check === false) {
	// 		echo "File is not an image";
	// 		$allOk = 0;
	// 	}
	// }

	if (file_exists($target_file)) {
    	header("Location: ../upload.php?q=File already exists");
   	}
	else if($_FILES["file"]["size"] > 5000000) {
		header("Location: ../upload.php?q=File size too large");
	}
	else if($imageType != "jpg" && $imageType != "png" && $imageType != "jpeg" && $imageType != "gif" ) {
   		header("Location: ../upload.php?q=File format not supported");
	}
	else if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		$_SESSION["no_pictures"]++;
        $num = $_SESSION["no_pictures"];
        include 'connection.php';
        $sql = "UPDATE user_profile_details SET no_pictures=$num WHERE username='$uname'";
        if ($conn->query($sql) === TRUE) {
 			echo "Success!";
 		}
 		else {
    		echo "Error";
		}
		
		#adding to url.json
		$myfile = fopen("../users/$uname/data/url.json", "r");

		$myJSON = fread($myfile, filesize("../users/$uname/data/url.json"));
		$res = array();
		$res = json_decode($myJSON);

		fclose($myfile);

		$myfile = fopen("../users/$uname/data/url.json", "w") or die("Unable to open file!");

		$target_dir = "users/" . $_SESSION["uname"] . "/photos/";
		$target_file = $target_dir . basename($_FILES["file"]["name"]);

		array_push($res, $target_file);

		$myJSON = json_encode($res);

		fwrite($myfile, $myJSON);

		fclose($myfile);
		#added to url.json

		header("Location: ../upload.php?q=File uploaded successfully");

		#add to collections
		$sql = "INSERT INTO user_collections (username, image_url, upload_by_name, no_stupefy, visibility) VALUES ('$uname', '$target_file', '$name', 0, 'all')";
        if ($conn->query($sql) === TRUE) {
 			echo "Success!";
 		}
 		else {
    		echo "Error";
		}
    } 
    else {
    	header("Location: ../upload.php?q=Sorry, there was an error uploading your file.");
    }
	
	$conn->close();
?>