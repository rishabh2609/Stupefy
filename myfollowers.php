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
		else {
			include 'php/update_no_followers.php';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Followers - <?php echo $_SESSION["name"]?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/myfollowers.css">
</head>
<body onload="showFollowers()">

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

	<div class="container">
		<div class="jumbotron">
			<h1 style="font-family: hBold;">My Followers</h1>
			<span class="badge"><?php echo $_SESSION["no_follow"]?></span>

			<div id="followers_container" style="margin-top: 40px;">
				
			</div>
		</div> 
	</div>


	<input type="hidden" value='<?php echo $_SESSION["uname"] ?>' id="username_cont">
</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/myfollowers.js"></script>
</html>