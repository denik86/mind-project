<?php

// Funzione che aggiunge il metodo di aggiunta di CDATA in modo da inserire i tag html all'interno del testo
class SimpleXMLExtended extends SimpleXMLElement {
  public function addCData($cdata_text) {
    $node = dom_import_simplexml($this); 
    $no = $node->ownerDocument; 
    $node->appendChild($no->createCDATASection($cdata_text)); 
  } 
}

$type = $_POST["type"];
$section = $_POST["section"];
$title = $_POST["title"];
$image = $_FILES["image"];
$author = $_POST["author"];
$email = $_POST["email"];
$title = $_POST["title"];
$keywords = $_POST["keywords"];
$abstract = $_POST["abstract"];
$body = $_POST["body"];

//permalink of title
$stringTitle = strtolower($title);
$stringTitle = preg_replace("/[^0-9A-Za-z ]/", "", $stringTitle);
$stringTitle = str_replace(" ", "-", $stringTitle);
$id = date("Y-m-d")."-".$stringTitle;

$article = new SimpleXMLExtended('<?xml version="1.0" encoding="UTF-8"?><article></article>');
$article->addAttribute('id', $id);
$article->addChild('section', "$section");
$article->addChild('subsection', "subsection");

$article->addChild('title', $title);
$article->addChild('image', $image['name']);
$article->addChild('author', $author);
$article->addChild('email', $email);
$article->addChild('date', date("d-m-Y"));
$article->addChild('keywords', $keywords);
$article->addChild('abstract', $abstract);
$articlebody = $article->addChild('body');
$articlebody->addCData($body);

move_uploaded_file($image['tmp_name'], "articles/images/".$image['name']);

/* Aggiunta di nodi che rappresentano paragrafi: SUPERFLUO MA UTILIZZABILE IN FUTURO
if(is_array($text) and is_array($titlepara)) {
	foreach($text as $ind => $para) {
		$paratag = $body->addChild('para');
		$paratag->addAttribute('order', $ind);
		$paratag->addChild('title', $titlepara[$ind]);
		$paratext = $paratag->addChild('text');
		$paratext->addCData($para);
	}
}
*/

$dom = dom_import_simplexml($article)->ownerDocument;
$dom->formatOutput = TRUE;
$dom->save($type."/".$id.".xml");


