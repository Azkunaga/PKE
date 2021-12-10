<?php
session_start();
if (!isset($_SESSION['email'])) {
		// existitzen ez bada, berriro kautotzera bidaltzen dut
		header("Location: Layout.php");
		//gainera, script-atik irtetzen gara
		exit();
}
session_destroy();

echo ("<script lenguage='javascript' type='text/javascript'> alert('Saioa itxi duzu! Hurrengora arte'); window.location='Layout.php'</script>");
include 'DecreaseGlobalCounter.php';
?>
