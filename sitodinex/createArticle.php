<?php
session_start();
if($_SESSION["login"] != "true") {
	header("Location:login.php");
	$_SESSION["error"] = "<font color=red>You don't have privileges to see admin page </font>";
	exit;
}

$xml = simplexml_load_file("article_types.xml");

?>
<html>
<head>
<title> Create Article </title>
<link rel="stylesheet" type="text/css" href="css/admin.css" />
<script>
function isReady(form) {
	if(form.title.value == "") {
		alert("Please enter a TITLE");
		return false;
	}
}
</script>
<script>
var sections = new Array();
<?php
foreach($xml->type as $type) {
	$nametype = $type->attributes()->name;
	echo "sections['$nametype'] = new Array();\n";
	foreach($type->section as $section) {
		$namesection = $section->attributes()->name;
		echo "sections['$nametype']['$namesection'] = '$namesection';\n";
	}
}
?>

function conditional_select(){
	var select = document.forms['createArticle'].type; //Recupero la SELECT
	var subselect = document.forms['createArticle'].section; //Recupero la seconda SELECT
				
	// Recupero la categoria selezionata
	var cat = select.options[select.selectedIndex].value;
				
	//Controllo che sia stata selezionata una categoria valida
	if(cat.length != 0){
		//Azzero il contenuto della seconda select
		for (var i = subselect.length - 1; i >= 0; i--)
			subselect.remove(i);
					
		//Popolo la seconda Select
		for(value in sections[cat]){
			//Creo il nuovo elemento OPTION da aggiungere nella seconda SELECT
			var NewOpt = document.createElement('option');
			NewOpt.value = value; // Imposto il valore
			NewOpt.text = sections[cat][value]; // Imposto il testo
						
			//Aggiungo l'elemento option
			try{
				subselect.add(NewOpt, null); //Metodo Standard, non funziona con IE
			}catch(e){
				subselect.add(NewOpt); // Funziona solo con IE
			}
		}
					
	}
}
</script>
</head>
<body>
<div class="content">
<h1>Create an article</h1>
<a href="admin.php">Cancel</a><br /><br />
<form name="createArticle" enctype="multipart/form-data" action="addArticle.php" method="post" onSubmit="return isReady(this)">
<table>
<tr><td>Article Type</td><td>
<select name="type" id="type" onChange="conditional_select()">
<option value="">Select a type</option>
<?php
foreach($xml->type as $type) {
	$nametype = $type->attributes()->name;
	echo "<option value=\"$nametype\">$nametype</option>\n";
}
?>
</select>
</td></tr>
<tr><td>Section</td><td>
<select name="section" is="section"></select>
</td></tr>
<tr><td>title</td><td><input name="title" type="text" id="title" /></td></tr>
<tr><td>image</td><td><input name="image" type="file" id="image" /></td></tr>
<tr><td>author</td><td><input name="author" type="text" id="author" /></td></tr>
<tr><td>email</td><td><input name="email" type="text" id="email" /></td></tr>
<tr><td>keywords</td><td><input name="keywords" type="text" id="keywords" /></td></tr>
<tr><td>abstract</td><td><textarea name="abstract" cols="50" rows="5" id="abstract"></textarea></td></tr>
<tr><td colspan="2"><div align=center>Body</div></td></tr>
<tr><td colspan="2"><textarea name="body" cols="122" rows="30" wrap="soft" id="body"></textarea></td></tr>
<tr><td colspan="2"><input type="submit" name="Add Article" value="Add Article" /> &nbsp; 
<input type="reset" name="reset" id="reset" /></td></tr>
</table>
</form>
</div>
</body></html>