<?php
session_start();
if($_SESSION["login"] != "true") {
	header("Location:login.php");
	$_SESSION["error"] = "<font color=red>You don't have privileges to see admin page </font>";
	exit;
}
?>
<a href="createArticle.php">Create new article</a><br><br>
<table>
<tr>
<td>
<table border=1>
<?php
echo "<h1> Normal (informatica) </h1>";
$dh = opendir('./articles');
while($file = readdir($dh)) {
	if(preg_match('/^..?$/', $file)) {
		continue;
	}
	echo "<tr><td>";
	echo "<a href=\"editArticle.php?file=articles/".$file."\">edit: ".$file."</a></td>";
	echo "<td>";
	echo '<a href="delArticle.php?file=$file">delete</a></td></tr>';
}
?>
</table>
<table border=1>
<?php
echo "<h1> Offtopic </h1>";
$dh = opendir('./offtopic');
while($file = readdir($dh)) {
	if(preg_match('/^..?$/', $file)) {
		continue;
	}
	echo "<tr><td>";
	echo "<a href=\"editArticle.php?file=offtopic/".$file."\">edit: ".$file."</a></td>";
	echo "<td>";
	echo '<a href="delArticle.php?file=$file">delete</a></td></tr>';
}
?>
</table>
<table border=1>
<?php
echo "<h1> Guide </h1>";
$dh = opendir('./guide');
while($file = readdir($dh)) {
	if(preg_match('/^..?$/', $file)) {
		continue;
	}
	echo "<tr><td>";
	echo "<a href=\"editArticle.php?file=guide/".$file."\">edit: ".$file."</a></td>";
	echo "<td>";
	echo '<a href="delArticle.php?file=$file">delete</a></td></tr>';
}
?>
</table>
</td></tr></table>