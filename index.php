<?php
    if(isset($_COOKIE["user"])) {
        header("Location: php/auto_login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Stupefy</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Rishabh Chanana">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/signin.css">
	<link rel="icon" href="favicon.png">
	<link rel="shortcut icon" href="favicon.png">
</head>
<body onload="cookie_check()">
<div class="container">
	<div class="jumbotron text-center">
		<h1 style="font-family: hBold; margin-top: -10px; margin-bottom: 60px !important;opacity: 0;">Stupefy</h1>
		<div class="container" id="signin">
			<center>
				<img src="logotext.png" class="img-responsive logo">
			</center>
			<form method="post" action="php/login.php">
				<p style="font-size: 1.1em; color: red;"><?php if($_SERVER['QUERY_STRING'] != NULL) { echo "Check username or password"; } ?></p>
				<input type="text" autocomplete="off" name="uname" required placeholder="Username" class="form-control" 
				value = '<?php if($_SERVER['QUERY_STRING'] == null) { echo "";} else { $res = $_REQUEST["q"];echo $res;} ?>'>
				<input type="password" name="pass" required placeholder="Password" class="form-control">
				<button type="submit" class="btn btn-danger" style="margin-bottom: 20px;">Sign in</button>
			</form>
			<a href = "signup.php">Not a member yet?<u>Sign up</u></a>
			<footer style="margin-top: 35px;margin-bottom: 30px;">Made by Rishabh</footer>
		</div>
		</div>
	</div>
</div>

</body>
<script src="js/cookie_check.js"></script>
</html>