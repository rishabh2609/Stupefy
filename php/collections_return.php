<?php
	session_start();
?>
<?php

	include 'connection.php';

	$q = $_REQUEST["q"];

	if($q == "") {
		$sql = "SELECT * FROM user_collections WHERE visibility = 'all' ORDER BY timeofupload DESC ";
	}
	else {
		$q = ucwords(strtolower($q));
		$sql = "SELECT * FROM user_collections WHERE upload_by_name = '$q' AND visibility = 'all' ORDER BY timeofupload DESC";
		echo "<h4 style='font-family: hBold;' style='margin-bottom:20px;'>Showing results for $q</h4>";
	}
	$result = $conn->query($sql);

	$response = "";
	$x = 1;
	$html_resp = "";
	$uname = $_SESSION["uname"];

	if ($result->num_rows > 0) {
	    // output data of each row
	    	$myfile = fopen("../users/$uname/data/likes.json", "r");

			$myJSON = fread($myfile, filesize("../users/$uname/data/likes.json"));
			$myArr = array();
			$myArr = json_decode($myJSON);
			
			fclose($myfile);

	    while($row = $result->fetch_assoc()) {
	    	if($x % 3 == 1 && $x > 3) {
	    		$html_resp = $html_resp . "</div>";
	    	}
	    	if($x % 3 == 1) {
	    		$html_resp = $html_resp . "<div class='row grid-row'>";
	    	}
	    	$img_url = $row["image_url"];
	    	$name = $row["upload_by_name"];
	    	$uname = $row["username"];
	    	$photo_id = $row["photo_id"];
	    	$noStup = $row["no_stupefy"];

	    	

			if(in_array($photo_id, $myArr)) {
				$html_resp = $html_resp . "<div class='col-sm-4'>
	    		<div class='collection-view' onmousedown='touch_3d(this)' onmouseup='clear_timer()' ontouchstart='touch_3d(this)' ontouchend='clear_timer()'>
	    			<center>
	    			<img src='$img_url' class='img-responsive'>
	    			</center>
						<a href='viewprofile.php?q=$uname'><h3 style='font-family: hBold;word-wrap: all;'>$name</h3></a>
						<h3><small>@$uname</small></h3>
						<span class='close-touch3d' onclick='close_touch_3d(this);'>&times</span>
						<button type='button' onclick='stupefy(this)' class='stupefy-btn' style='color: blue !important;'><span class='glyphicon glyphicon-flash'></span><span id='stup_count_$photo_id'>$noStup</span></button>
						<input type='hidden' value = '$photo_id'>
				</div>
				</div>
	    	";
			}
			else {
				$html_resp = $html_resp . "<div class='col-sm-4'>
	    	<div class='collection-view' onmousedown='touch_3d(this)' onmouseup='clear_timer()' ontouchstart='touch_3d(this)' ontouchend='clear_timer()'>
	    			<center>
	    			<img src='$img_url' class='img-responsive'>
	    			</center>
						<a href='viewprofile.php?q=$uname'><h3 style='font-family: hBold;word-wrap: all;'>$name</h3></a>
						<h3><small>@$uname</small></h3>
						<span class='close-touch3d' onclick='close_touch_3d(this);'>&times</span>
						<button type='button' onclick='stupefy(this)' class='stupefy-btn'><span class='glyphicon glyphicon-flash'></span><span id='stup_count_$photo_id'>$noStup</span></button>
						<input type='hidden' value = '$photo_id'>
				</div>
				</div>
	    	";
			}	
	    	 

	    	$x++;
			
	    	 
	    }

	    $response = $response . $html_resp;
	} 
	else {
		$response = "No photos found";
	}
	echo $response;


	$conn->close();
?>