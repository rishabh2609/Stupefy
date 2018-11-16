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
	<title><?php echo $_SESSION["name"]?> - Upload</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/upload.css">
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

	<div class="container">
		<div class="jumbotron">

			<div class="row">
				<div class="col-xs-8 col-sm-10">
					<h1 style="font-family: hBold;">Upload photo</h1>
				</div>
				<div class="col-xs-4 col-sm-2">
					<a href="profile.php" style="margin: 0px; padding: 0px;" title="Remember to save changes!"><h3 style="text-align: right;">Done</h3></a>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-4">	
					<center>
						<img src='<?php echo $_SESSION["profile_pic_url"]?>' style="max-width: 150px;" class="img-circle">
					</center>
				</div>
				<div class="col-sm-8" id="user_name">
					<h2 style="font-family: hBold;"><?php echo $_SESSION["name"]?></h2>
					<h2 style="margin-top: -10px;"><small>@<?php echo $_SESSION["uname"]?></small></h2>
				</div>
			</div>

			<p style='font-size: 2rem;color: <?php if($_SERVER['QUERY_STRING'] == null) { echo "red";} else { $res = $_REQUEST["q"];if($res == "File uploaded successfully"){echo "green";}else{echo "red";}}?>;'><?php if($_SERVER['QUERY_STRING'] == null) { echo "";} else { $res = $_REQUEST["q"];echo $res;} ?></p>
			<form action="php/upload_image.php" method="post" enctype="multipart/form-data">
				<input type="file" name="file" id="file" style="display: none;">
				<label for="file" style="cursor: pointer;"><h2><small>Choose a file <span class="glyphicon glyphicon-open"></span></small></h2></label><br/>
				<center>
					<img src="" class="img-responsive" id="preview">
					<input type="submit" value="Upload" class="btn btn-link hidden" id="btn-upload" name="submit" style="margin-top: 30px;">
				</center>
			</form>

		</div>
	</div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/upload_image.js"></script>
</html>