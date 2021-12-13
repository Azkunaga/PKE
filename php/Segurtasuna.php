<?php
	//sesio hasiera
	session_start();
	// IKASLEA KAUTOTURIK DAGOELA EGIAZTATU
	if (!isset($_SESSION['email'])) {
		// existitzen ez bada, berriro kautotzera bidaltzen dut
		header("Location: Layout.php");
		//gainera, script-atik irtetzen gara
		exit();
	}
?>