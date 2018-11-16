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
	include 'php/display_user_profile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Stupefy - <?php echo $_SESSION["name"] ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/profile.css">
</head>
<body>

	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		    </button>

			<a class="navbar-brand" href="profile.php" style="font-family: hBold;"><?php echo $_SESSION["name"]?></a>

		</div>
			
			<div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav navbar-right">
		      		<li><a href="editprofile.php">Edit profile</a></li>
		      		<li><a href="collections.php">Collections</a></li>
					<li><a href="php/logout.php" style="font-family: hBold;">Logout</a></li>
				</ul>
		    </div>
			
		</div>
	</nav>

	<!-- The Modal -->
	<div id="myModal" class="modal">

		<!-- The Close Button -->
		<span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

		<!-- Modal Content (The Image) -->
		<img class="modal-content" id="img01">

		<!-- Modal Caption (Image Text) -->
		<h1 id="caption" style="text-align: left;font-family: hBold;"><?php echo $name?></h1>
	</div>



	<div class="container">
		
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-8">
					<h1 style="font-family: hBold;text-transform: capitalize;"><?php echo $name ?></h1>
					<h2 style="display: inline;"><small>@<span id="username_disp"><?php echo $uname ?></span></small></h2>
				</div>
				<div class="col-sm-4 text-center">
					<button type="button" class="btn" id="btn-follow">Follow</button>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-sm-8">
				<center>
					<img src="<?php echo $profile_pic_url ?>" class="img-responsive" style="max-width: 40%;" />
				</center>
			</div>
			<div class="col-sm-4">
				<div class="row">
					
					<div class="col-sm-6 col-xs-6">
						<h1 class="text-center heading_val" style="font-family: hBold;" id="no_follow_container"><?php echo $no_follow ?></h1>
						<h2 style="text-transform: uppercase" class="text-center"><small>followers</small></h2>
					</div>

				

					
					<div class="col-sm-6 col-xs-6">
						<h1 class="text-center heading_val" style="font-family: hBold;"><?php echo $no_pictures?></h1>
						<h2 style="text-transform: uppercase;" class="text-center"><small>pictures</small></h2>
						
					</div>

				</div>

				<div class="row">					
					<div class="col-sm-12">
						<h1 class="text-center heading_val" style="font-family: hBold;"><?php echo $status?></h1>
						<h2 style="text-transform: uppercase;" class="text-center"><small>status</small></h2>
						
					</div>

				</div>

			</div>
				


		

		<!-- my photos -->
		<div class="jumbotron">
			<div class="row">
				<div class="col-xs-10 col-sm-10">
					<h1 style="font-family: hBold;">Photos</h1>
				</div>
				<div class="col-xs-2 col-sm-2">
					
				</div>
			</div>

			<!-- photo grid -->
			<?php
			$myfile = fopen("users/$uname/data/url.json", "r");

			$myJSON = fread($myfile, filesize("users/$uname/data/url.json"));

			$res = array();
			$res = json_decode($myJSON);

			$arrlength = count($res);
			?>
			<?php

				if($arrlength == 0) {
					echo "<h4>No photos added</h4>";
				}

				for($x = 0; $x < $arrlength; $x++) {
					echo '<div class="row grid-row">';
				    	
				    	if($x >= $arrlength) {
				    		continue;
				    	}
				    	$photo_url = $res[$x];
				    	echo '<div class="col-sm-6 col-xs-6">';
				    		echo '<center>';
				    			echo "<img src='$photo_url' class='img-responsive' onclick='openmodal(this)'>";
				    		echo '</center>';
				    	echo '</div>'; 
				  		$x++;
				    	if($x >= $arrlength) {
				    		continue;
				    	}
				    	$photo_url = $res[$x];
				    	echo '<div class="col-sm-6 col-xs-6">';
				    		echo '<center>';
				    			echo "<img src='$photo_url' class='img-responsive' onclick='openmodal(this)'>";
				    		echo '</center>';
				    	echo '</div>';

				    echo '</div>';
				}
			?>
			

		</div>
		<a href="trending.html" style="font-size: 2rem;">See what's trending?<u>Here</u></a> 
	</div>


</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/viewprofile.js"></script>
</html>