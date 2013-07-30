<?php

$doc = new DOMDocument('1.0', 'utf-8');

$root = $doc->appendChild($doc->createElement("root"));

$el_code = $doc->createElement("code",$code);
$root->appendChild($el_code);


$el_desc = $doc->createElement("description",$desc);
$root->appendChild($el_desc);


$el_p = $doc->createElement("pour",$pour);
$root->appendChild($el_p);
$el_c = $doc->createElement("contre",$contre);
$root->appendChild($el_c);

$el_clan = $doc->createElement("clan",$clan);
$root->appendChild($el_clan);
$el_defi = $doc->createElement("defi",$defi);
$root->appendChild($el_defi);

echo $doc->saveXML();
//$doc->save('test.xml');

?>