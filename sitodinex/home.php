<table>              
<?php
// load files xml
$files = glob("articles/*.xml");
$id = array();

// match articles id
foreach($files as $val) {
	preg_match("/[0-9]{4}.[a-zA-z0-9\-]*/", $val, $m);
	$id[] = trim(end($m));		
}
$id = array_reverse($id);
for($i = 0; $i <= 7; $i++) {
	if(isset($id[$i]) && file_exists("articles/$id[$i].xml")) {
		$xml = simplexml_load_file("articles/$id[$i].xml");
	} else {
		$xml = null;
	}
	if(is_object($xml)) {
		if($i%2 == 0)
			echo "<tr>\n";
		echo "<td class=\"cell\">";
		head($xml, "articles");
		echo "</td>\n";
		if($i%2 == 1)
			echo "</tr>\n";
	}
}
?>
             

</table> 