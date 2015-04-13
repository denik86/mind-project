<?php
session_start();
if($_SESSION["login"] != "true") {
	header("Location:login.php");
	$_SESSION["error"] = "<font color=red>You don't have privileges to see admin page</font>";
	exit;
}

$file = $_GET["file"];
if($file == "") {
	header("Location:admin.php");
	$_SESSION["error"] = "<font color=red>Select a file to edit</font>";
	exit;
} else {
	$xml = simplexml_load_file($file);
}
?>
<html>
<head>
<title> Edit Article </title>
<script>
function isReady(form) {
	if(form.title.value == "") {
		alert("Please enter a TITLE");
		return false;
	}
}
</script>
</head>
<body>
<h1> Edit an article</h1>
<a href="admin.php">Cancel</a><br /><br />
<form name="updateArticle" action="updateArticle.php" method="post" onSubmit="return isReady(this)">
<table>
<tr><td>
<label for="normal">Normal</label><input name="type" type="radio" id="articles" value="articles"/><br>
<label for="offtopic">Offtopic</label><input name="type" type="radio" id="offtopic" value="offtopic"/><br>
<label for="guide">Guida</label><input name="type" type="radio" id="guide" value="guide"/><br>
</td></tr>
<tr><td>title</td><td><input name="title" type="text" id="title" value="<?php echo $xml->title; ?>" /></td></tr>
<tr><td>image</td><td><input name="image" type="text" id="image" value="<?php echo $xml->image; ?>" /></td></tr>
<tr><td>author</td><td><input name="author" type="text" id="author" value="<?php echo $xml->author; ?>" /></td></tr>
<tr><td>email</td><td><input name="email" type="text" id="email" value="<?php echo $xml->email; ?>"  /></td></tr>
<tr><td>date</td><td><input name="date" type="text" id="date" value="<?php echo $xml->date; ?>"  /></td></tr>
<tr><td>update</td><td><input name="update" type="text" id="udpate" value="<?php echo $xml->udpate; ?>"  /></td></tr>
<tr><td>keywords</td><td><input name="keywords" type="text" id="keywords" value="<?php echo $xml->keywords; ?>" /></td></tr>
<tr><td>abstract</td><td><textarea name="abstract" cols="50" rows="5" id="abstract" ><?php echo $xml->abstract; ?></textarea></td></tr>
</table>
<h1>Body</h1>
<table>

<?php
foreach($xml->xpath("//body/para") as $ind => $para) {
	?>		
    <tr><td>Para <?php echo $ind; ?></td></tr>
    <tr><td>title</td><td><input name="titlepara[1]" type="text" id="titlepara[1]" value="<?php echo $para->title; ?>" /></td></tr>
    <tr><td colspan=2><textarea name="text[1]" cols="70" rows="10" wrap="soft" id="text[1]"><?php echo $para->text; ?></textarea></td></tr><td><tr> <?php echo $para->text; ?>
    <?php 
}

?>
</tr></td>
<tr><td><input type="submit" name="Add Article" value="Add Article" /> &nbsp; 
<input type="reset" name="reset" id="reset" /></td></tr>
</table>
</form>
</body></html>
	




