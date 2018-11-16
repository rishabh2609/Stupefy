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
	<title>Edit - <?php echo $_SESSION["name"] ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/editprofile.css">
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

			<a class="navbar-brand" href="profile.php" style="font-family: hBold;"><?php echo $_SESSION["name"] ?></a>

		</div>
			
			<div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav navbar-right">
		      		<li><a href="upload.php">Upload image</a></li>
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
					<h1 style="font-family: hBold;">Edit profile</h1>
				</div>
				<div class="col-xs-4 col-sm-2">
					<a href="profile.php" style="margin: 0px; padding: 0px;" title="Remember to save changes!"><h3 style="text-align: right;">Done</h3></a>
				</div>
			</div>

			<div class="row" style="margin-top: 40px !important;">
				<div class="col-sm-6">	
					<center>
						<form action="php/change_profile_pic.php" method="post" enctype="multipart/form-data">

							<img src="<?php echo $_SESSION["profile_pic_url"] ?>" class="img-responsive img-thumbnail" style="max-width: 75%;" id="profile_pic_preview">
							<input type="file" name="file" id="file" style="display: none;"> 
							<label for="file" style="cursor: pointer;"><h3>Change picture</h3></label>
							<button class="btn btn-danger">Upload</button>
						</form>
					</center>
				</div>
				<div class="col-sm-6 text-center">
					<h1 style="font-family: hBold;"><?php echo $_SESSION["name"]?></h1>
					<h2 style="margin-top: -5px; margin-bottom: 45px;"><small>@<?php echo $_SESSION["uname"]?></small></h2>
					
						<div class="form-group">
							<label for="status">Status (max 16 characters):</label>
							<input type="text" name="status" maxlength="16" class="form-control" id="status" value="<?php echo $_SESSION["status"]?>" required>
					  	</div>

					  	<p id="status_update" style="font-size: 1.2rem;color: green;"></p>

					  	<button type="submit" class="btn btn-link" onclick="update_status()"><h3>Update status</h3></button>
				
				</div>
			</div>
			
		</div>
	</div>

</body>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/update_status.js"></script>
</html>