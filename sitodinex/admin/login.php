<?php
session_start();
if (isset($_POST["invio"])) 
{
  	if ($_POST["passwd"] == "rOn21886")
	{
    	session_register('autorizzato');
    	$_SESSION["autorizzato"] = 1;
    	$destinazione = "admin.php";
  	} 
	else 
	{
    	$destinazione = "destroy.php";
  	}
  	echo '<script language=javascript>document.location.href="'.$destinazione.'"</script>';
} 
else 
{
?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
	<html>
	<head>
	<title>Login</title>
	</head>
	<body>
	<form method=post action="login.php">
	Password:  <br>  <input width="100" type="password" name="passwd"><br>
	<input type="submit" name="invio" value="invio">
	&nbsp;
	<input type="reset" name="cancella" value="cancella">
	</form>
	</body>
	</html>
<?
}
?>