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

<!DOCTYPE html>
<html>
<head>
	<title>Trending - Top 10</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/trending.css">
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

			<a class="navbar-brand" href="#" style="font-family: hBold;"><?php echo $_SESSION["name"]?></a>

		</div>
			
			<div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav navbar-right">
		      		<li><a href="editprofile.php">Edit profile</a></li>
		      		<li><a href="upload.php">Upload photo</a></li>
		      		<li><a href="collections.php">Collections</a></li>
					<li><a href="php/logout.php" style="font-family: hBold;">Logout</a></li>
				</ul>
		    </div>
			
		</div>
	</nav>

<div class="container" style="padding: 0px 0px;">
	<div class="jumbotron" style="margin: 0px;">
		<h1 style="font-family: hBold;">Trending</h1>
		<a href="collections.php"><h3>View full collection</h3></a>
			<center>
				<div class="container">
					<!-- image 1 -->
					<div class="img-view" onmousedown="touch_3d(this)" onmouseup="clear_timer()" ontouchstart="touch_3d(this)" ontouchend="clear_timer()">
							<img src="sample1.jpg" class="img-responsive img-thumbnail">
							<h2 style="font-family: hBold;">Name</h2>
							<span class="glyphicon glyphicon-flash"></span>
							<span class="counter">23</span>
						<span class="close-touch3d" onclick="close_touch_3d(this);">&times</span>
					</div>
					
				</div>
			</center>
	</div>
</div>
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/trending.js"></script>
</html>