<?php
	//sesio hasiera
	session_start();
	// IKASLEA KAUTOTURIK DAGOELA EGIAZTATU
	if (!isset($_SESSION['email']) || $_SESSION['erabMota']!="irakaslea" || $_SESSION['email']=="admin@ehu.es") {
		// existitzen ez bada, berriro kautotzera bidaltzen dut
		header("Location: Layout.php");
		//gainera, script-atik irtetzen gara
		exit();
	}
?>