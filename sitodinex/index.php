<?php

function head($article_xml, $type) {
	$article_id = $article_xml->attributes()->id;
	echo "<div class=\"section\">$article_xml->section</div>";
	echo "<div class=\"head_image\"><img src=\"$type/images/$article_xml->image\"></div>";
	echo "<a href=\"index.php?page=show&id=$article_id\"><h1>$article_xml->title</h1></a>";
	echo "<div class=\"date\">$article_xml->date</div>";
	echo "<h2>$article_xml->abstract</h2>";
}

$_page="home"; //pagina di default per i contenuti centrali
if(isset($_GET['page']))
{
    $_page=$_GET['page'];
    if($_page!=basename($_page) || !preg_match("/^[A-Za-z0-9\-_]+$/",$_page) || !file_exists($_page.".php"))
        $_page="error"; //pagina di errore
}
?>
<html>
<head>
<title>Denik</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="title" content="Dinex" />
<meta name="author" content="Daniele Ronzani" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body> 
<div id="header">
	<span id="logo"></span>
    <h1> PROVA </h1>
</div>

<div id="path">Ti trovi in: </div>
 
 <!-- NAVIGATION ------------------------------------------->
<div id="nav">
	<ul>
    	<li><a href="index.php?page=home">Home</a></li>
        <li><a href="index.php?page=articles&type=articles">Articoli</a></li>
        <li><a href="index.php?page=articles&type=guide">Guide</a></li>
        <li><a href="index.php?page=articles&type=offtopic">Offtopic</a></li>
        <!-- cambiare pagine dei tre tipi con variabile ma stessa pagina articles.php -->
        <li><a href="index.php">Altro</a></li>
    </ul>
</div>

<!-- EXTRA ----------------------------------------------------------------------------------------------------------------------->
  <div id="extra">
    <script type="text/javascript">
/* <![CDATA[ */
google_color_border = "003399";
google_color_bg = "FFFFFF";
google_color_link = "0033CC";
google_color_url = "008000";
google_color_text = "000000";
google_ui_features = "rc:6";
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=120X600/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script>
  </div>


<!-- CONTENT --------------------------------------------------------------------------------------------------------------------->
  <div id="content">    <?php include($_page.".php"); ?>
  </div>
<!-- FOOTER ---------------------------------------------------------------------------------------------------------------------->
  <div id="footer"> <span style="text-align:left; width:600px"><b> &nbsp; &nbsp;Dinex &amp;copy 2012 - Tutti i diritti riservati - info: <a href="dinexus86@yahoo.it">dinexus86@yahoo.it</a></b></span>
    <div> &nbsp; &nbsp;<a target="_blank" href="admin/login.php">Admin </a> </div>
  </div>
 <!-- ------------------------->
</div>
</body>
</html>