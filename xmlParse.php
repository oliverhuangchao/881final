<?php
//libxml_disable_entity_loader(false);
ini_set ('display_errors', true);
error_reporting (E_ALL | E_STRICT);

$dom = new DOMDocument();
$dom->load("test.xml");
 
$xpath = new DOMXPath($dom);
$elements = $xpath->query("/docs/p");
if(!is_null($elements)) {
	foreach($elements as $element) {
    //echo "<br/>[". $element->nodeName. "]";

    $nodes = $element->childNodes;
    foreach ($nodes as $node) {
    	if ($node->nodeName == "title"){
      		echo $node->nodeValue. "\n";
      		}

    }
  }
}

?>