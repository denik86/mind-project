<?php
// load files xml
$type = $_GET['type'];
$files = glob("$type/*.xml");
$id = array();

// match articles id
foreach($files as $val) {
	preg_match("/[0-9]{4}.[a-zA-z0-9\-]*/", $val, $m);
	$id[] = trim(end($m));		
}
$id = array_reverse($id);

//$xmlsections = simplexml_load_file("articles/sections.xml");

/*
foreach($xmlsections->section as $section)
{
	$section = $section->attributes()->name;
	$printsection = ucfirst($section);
	echo "<h1>$printsection</h1>\n<table>"; */
	$i = 0;
	$end = 0;
	echo ("<table>");
	while($end < 20 && $i < sizeof($id)) {
		if(isset($id[$i]) && file_exists("$type/$id[$i].xml")) {
			$xml = simplexml_load_file("$type/$id[$i].xml");
		} else {
			$xml = null;
		}
		if(is_object($xml) /* && !strcmp($section,$xml->attributes()->section) */) {
			if($end%2 == 0)
				echo "<tr>\n";
			echo "<td class=\"cell\">";
			head($xml, $type);
			echo "</td>\n";
			if($end%2 == 1)
				echo "</tr>\n";
			$end++;
		}
		$i++;
	
	}
	echo "\n</table>\n";
	
//}
?>
             

</table>  