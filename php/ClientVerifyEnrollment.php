<?php 
$soapclient = new SoapClient('http://ehusw.es/rosa/webZerbitzuak/egiaztatuMatrikula.php?wsdl');
if (isset($_POST['eposta'])){
	echo $soapclient->egiaztatuE($_POST['eposta']); 
}
?>