<?php
$xml = simplexml_load_file('../xml/UserCounter.xml');
$kont=(int) $xml->balioa;
$kont--;
$xml->balioa=$kont;
$xml->asXML('../xml/UserCounter.xml'); //aldaketak gordetzen ditugu
?>