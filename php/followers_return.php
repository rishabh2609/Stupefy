<?php
	$q = $_REQUEST["q"];
	$uname = $q;

	$myfile = fopen("../users/".$uname."/data/followedby.json", "r");

	$myJSON = fread($myfile, filesize("../users/$uname/data/followedby.json"));

	$res = array();
	$res = json_decode($myJSON);

	$arrlength = count($res);

	
	if($arrlength == 0) {
		echo "<h3>No followers yet :(</h3>";
	}
	include 'connection.php';
	for($x = 0; $x < $arrlength; $x++) {
		$fdetails_uname = $res[$x];
		$following = 0;
		$sql = "SELECT * FROM user_profile_details WHERE username = '$fdetails_uname'";

		$result = $conn->query($sql);

		$row = $result->fetch_assoc();

		$fdetails_name = $row["name"];
		$fdetails_nofollow = $row["no_follow"];
		$fdetails_profilepic = $row["profile_pic_url"];

		#check whether i follow him/her

		$checkfile = fopen("../users/".$uname."/data/following.json", "r");
		$JSON = fread($checkfile, filesize("../users/".$uname."/data/following.json"));

		$res_check = array();
		$res_check = json_decode($JSON);
		
		if(in_array($fdetails_uname, $res_check) ) {
			$following = 1;
		}

		fclose($checkfile);
		
		if($following == 0) {
			echo "<div class='media'>
					<div class='media-left'>
						<img src='$fdetails_profilepic' class='media-object' style='width:60px'>
					</div>
					<div class='media-body'>
						<a href='viewprofile.php?q=$fdetails_uname'><h3 class='media-heading' style='font-family: hBold;'>$fdetails_name</h3></a>
						<span class='badge'>$fdetails_nofollow</span>
						<p>@<span>$fdetails_uname</span></p>
						<button type='button' class='btn btn-default' onclick='follow_person(this)'>Follow</button>
					</div>
				</div>";
		}	
		else {
			echo "<div class='media'>
					<div class='media-left'>
						<img src='$fdetails_profilepic' class='media-object' style='width:60px'>
					</div>
					<div class='media-body'>
						<a href='viewprofile.php?q=$fdetails_uname'><h3 class='media-heading' style='font-family: hBold;'>$fdetails_name</h3></a>
						<span class='badge'>$fdetails_nofollow</span>
						<p>@<span>$fdetails_uname</span></p>
						<button type='button' class='btn btn-primary'>Following</button>
					</div>
				</div>";
		}
	}

	$conn->close();
	fclose($myfile);
?>