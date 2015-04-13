<?php
session_start();
$user= 'tom';
$passw = 'test';

if(($_POST["username"] = $user) and ($_POST["password"] = $passw)) {
	$_SESSION["login"] = "true";
	header("Location:admin.php");
	exit;
}
else {
	$_SESSION["error"] = "wrong username or password. Try again";
	header("Location:login.php");
}
?>