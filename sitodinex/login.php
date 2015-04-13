<?php
session_start();
?>

<html>
<title> Login </title>
<body>
<form name="login" method="post" action="verify.php">
<table>
<tr>
<td colspan="2"><div> Please log in </div></td>
</tr>
<tr>
<td><div>Login</div></td>
<td><div><input name="username" type="text" id="username" /></div></td>
</tr>
<tr>
<td><div>Password</div></td>
<td><div><input name="password" type="password" id="password" /></div></td>
</tr>
<tr>
<td colspan="2"><div>
<input type="submit" name="Submit" value="Submit" />
&nbsp;
<input type="reset" name="reset" id="reset" value="reset" />
</div></td>
</tr>
<tr>
<td colspan="2"><?php echo $_SESSION["error"]; ?></td>
</tr>
</table>
</form>
</body>
</html>