<?php
//libxml_disable_entity_loader(false);
ini_set ('display_errors', true);
error_reporting (E_ALL | E_STRICT);

$dom = new DOMDocument();
$dom->load("test.xml");
/*
shownode($dom->getElementsByTagName('docs')->item(0));
function shownode($dom) {
foreach ($dom->childNodes as $p)
  if (hasChild($p)) {
      	//echo $p->nodeName.' -> CHILDNODES<br>';
      	shownode($p);
  } elseif ($p->nodeType == XML_ELEMENT_NODE)
  	if($p->nodeName=="title")
   	echo $p->nodeName.' '.$p->nodeValue.'<br>';
}
function hasChild($p) {
if ($p->hasChildNodes()) {
  foreach ($p->childNodes as $c) {
   if ($c->nodeType == XML_ELEMENT_NODE)
    return true;
  }
}
return false;
}
*/
$xpath = new DOMXPath($dom);
$elements = $xpath->query("/docs/pp");
if(!is_null($elements)) {
	foreach($elements as $element) {
    //echo "<br/>[". $element->nodeName. "]";

    $nodes = $element->childNodes;
    foreach ($nodes as $node) {
    	if ($node->nodeName == "title"){
      		echo $node->nodeValue.'<br>';
      		}

    }
  }
}

?>