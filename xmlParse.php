<?php
  ini_set ('display_errors', true);
  error_reporting (E_ALL | E_STRICT);
  $dom = new DOMDocument();
  $dom->load("data/first.xml");

  $titleArray = array();
  $count = 0;
  $xpath = new DOMXPath($dom);
  $elements = $xpath->query("/docs/pp");
  if(!is_null($elements)) {
  	foreach($elements as $element) {
      $nodes = $element->childNodes;
      foreach ($nodes as $node) {
      	if ($node->nodeName == "title"){
            $titleArray[$count] = $node->nodeValue;
            $count = $count + 1;
        }
      }
    }
  }
?>