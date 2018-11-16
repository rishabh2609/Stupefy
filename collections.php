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
<html lang="en">
<head>
	<title>Collections - <?php echo $_SESSION["name"]?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/collection.css">
</head>
<body onload='showCollections("");'>

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
		      		<li><a href="upload.php">Upload photo</a></li>
		      		<li><a href="trending.php">Trending</a></li>
		      		<li><a href="php/logout.php" style="font-family: hBold;">Logout</a></li>
				</ul>
		    </div>
			
		</div>
	</nav>

	<div class="row">
		<div class="col-sm-12 text-center" style="background: rgb(230, 230, 230);margin-bottom: 30px;padding: 10px 10px;margin-top: -20px;">
			<input type="text" class="search_bar" id = "search_bar" placeholder="Search Collections" onfocus="this.style.textAlign = 'left';" onblur="this.style.textAlign = 'center';" onkeyup="showResult(this.value)" onchange="if(this.value == '') showCollections('')">
		</div>
		
	</div>
	<div id="livesearch"></div>

	<div class="container">
		<div class="jumbotron">
			<h1 style="font-family: hBold;margin-bottom: 30px;">Collections</h1>
			<input type="hidden" value='<?php echo $_SESSION["uname"] ?>' id = "user_name">

		<div id="all-collections">

			<!-- <div class="row">
				<div class="col-sm-4">
					<div class="collection-view" onmousedown="touch_3d(this)" onmouseup="clear_timer()" ontouchstart="touch_3d(this)" ontouchend="clear_timer()">
						<img src="sample1.jpg" class="img-responsive">
						<h3 style="font-family: hBold;word-wrap: all;">Rishabh Chanana</h3>
						<span class="close-touch3d" onclick="close_touch_3d(this);">&times</span>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="collection-view" onmousedown="touch_3d(this)" onmouseup="clear_timer()" ontouchstart="touch_3d(this)" ontouchend="clear_timer()">
						<img src="sample2.jpg" class="img-responsive" >
						<h3 style="font-family: hBold;word-wrap: all;">John Appleseed</h3>
						<span class="close-touch3d" onclick="close_touch_3d(this);">&times</span>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="collection-view" onmousedown="touch_3d(this)" onmouseup="clear_timer()" ontouchstart="touch_3d(this)" ontouchend="clear_timer()">
						<img src="avatar.png" class="img-responsive" >
						<h3 style="font-family: hBold;word-wrap: all;">John Appleseed</h3>
						<span class="close-touch3d" onclick="close_touch_3d(this);">&times</span>
					</div>
				</div>
			</div> -->

		</div>

		</div>
	</div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/collections.js"></script>
<script src="js/livesearch.js"></script>
</html>