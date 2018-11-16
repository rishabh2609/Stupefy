<?php
	session_start();
?>
<?php
if (isset($_COOKIE['user'])) {
    unset($_COOKIE['user']);
    setcookie('user', null, -1, '/');
}
?>
<?php
	session_unset(); 
	session_destroy(); 
?>
<?php
	header("Location: ../index.php");
?>

