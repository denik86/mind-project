
<?php
$tp = $_POST['topic'];
$sc = $_POST['section'];
$id = $_POST['id'];
$tt = $_POST['title'];
$sb = $_POST['subtitle'];
$tx = $_POST['text'];
$dt = $_POST['date'];

$tx = str_replace("'", "''", $tx);
$sb = str_replace("'", "''", $sb);
$tt = str_replace("'", "''", $tt);

$connection = mysql_connect("localhost", "dinex", "dakdugebge47") or die (mysql_error());
mysql_select_db("my_dinex", $connection);
$count = mysql_query("select count(*) as tot from articles");
$idm = mysql_query("select max(id) as idm from articles");

if(isset($_POST['title'])){
mysql_query("insert into articles (topic, section, id, title, subtitle, text, date) values ('$tp', '$sc', '$id', '$tt', '$sb', '$tx', '$dt')") or die (mysql_error());
mysql_close();
				}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>INSERT ARTICLE</title>
</head>

<body>
Articoli inseriti: <?php $count = mysql_fetch_assoc($count); print $count["tot"]; ?><br />
Ultimo articolo: <?php $idm = mysql_fetch_assoc($idm); print "ID = ".$idm["idm"]; ?><br />
<form method="post" action="insert.php">
TOPIC
<input name="topic" type="text" size="20" maxlength="20" /> &nbsp;&nbsp;
SECTION
<input name="section" type="text" size="20" maxlength="20" /><br /><br />
ID <br />
<input name="id" type="text" size="5" maxlength="5" /><br />
TITLE <br />
<input name="title" type="text" size="100" maxlength="100" /><br />
SUBTITLE<br />
<input name="subtitle" type="text" size="200" maxlength="200" /><br />
TEXT<br />
<textarea name="text" rows="50" cols="90"></textarea><br />
DATE<br />
<input name="date" type="text" size="10" maxlength="10" /><br />
<input type="submit" name="invia" value="Invia i dati">
</form>

</body>
</html>

