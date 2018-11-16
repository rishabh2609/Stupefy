<?php
	include 'connection.php';
	$name = ucwords(strtolower($_GET['name']));
	$uname = strtolower($_GET['uname']);
	$pass = $_GET['pass'];
	$gender = $_GET['gender'];
	$sql = "INSERT INTO user_sign_in (username, password) VALUES ('$uname', '$pass')";
	if($conn->query($sql) === FALSE) {
		echo "Error try again in a little bit";
	}
	
	mkdir("../users/$uname");
	mkdir("../users/$uname/profile_pictures");
	mkdir("../users/$uname/photos");
	mkdir("../users/$uname/data");
	$url_file = fopen("../users/$uname/data/url.json", "w");
	fwrite($url_file, "[]");
	fclose($url_file);
	
	$url_file = fopen("../users/$uname/data/likes.json", "w");
	fwrite($url_file, "[]");
	fclose($url_file);

	$url_file = fopen("../users/$uname/data/following.json", "w");
	fwrite($url_file, "[]");
	fclose($url_file);

	$url_file = fopen("../users/$uname/data/followedby.json", "w");
	fwrite($url_file, "[]");
	fclose($url_file);

	if($gender == "Male") {
		copy("../avatar.png", "../users/$uname/profile_pictures/default.png");
	}
	else {
		copy("../avatar_female.png", "../users/$uname/profile_pictures/default.png");	
	}


	$sql = "INSERT INTO user_profile_details (username, name, profile_pic_url, no_follow, no_pictures, status) VALUES ('$uname', '$name', 'users/$uname/profile_pictures/default.png', 0, 0, 'New member!')";
	if($conn->query($sql) === TRUE) {
		include 'session_set.php';
		include 'cookie_set.php';
		header("Location: ../profile.php");
	}
	else {
		echo "Error try again in a little bit";
	}

	
	$conn->close();
?>