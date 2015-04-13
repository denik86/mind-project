<?php
$p="00001"; //pagina di default per i contenuti centrali
if(isset($_GET['id']))
{ //pagina passata via parametro
    $p=$_GET['id'];
    if($p!=basename($p) || !preg_match("/^[A-Za-z0-9\-_]+$/",$p))
        $p="error"; //pagina di errore
	
	if(file_exists("articles/$p.xml")) {
		$xml = simplexml_load_file("articles/$p.xml");
		$path = "articles";
	} else if (file_exists("offtopic/$p.xml")) {
		$xml = simplexml_load_file("offtopic/$p.xml");
		$path = "offtopic";
	} else if (file_exists("guide/$p.xml")) {
		$xml = simplexml_load_file("guide/$p.xml");
		$path = "guide";
	} else {
		$xml = null;
	}
	if(is_object($xml))
	{
		echo "<span class=\"date\">$xml->date</span>";
		echo "<h1>$xml->title</h1>";
		echo "<h2>$xml->abstract</h2>";
		echo "<div class=\"head_image\"><img src=\"$path/images/$xml->image\"></div>";
		echo "<div class=\"contentBody\">$xml->body</div>";	
	}
}

?>

<div align="center">
<script type="text/javascript">
/* <![CDATA[ */
google_color_border = "17203E";
google_color_bg = "17203E";
google_color_link = "a0c0ff";
google_color_url = "C0DBB0";
google_color_text = "bbbbbb";
google_ui_features = "rc:0";
document.write('<s'+'cript type="text/javascript" src="http://ad.altervista.org/js.ad/size=300X250/r='+new Date().getTime()+'"><\/s'+'cript>');
/* ]]> */
</script>
</div>

</div>