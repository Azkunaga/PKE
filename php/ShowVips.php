<!DOCTYPE html>
<?php include "SegurtasunaIrakaslea.php" ?>
<html>
	<head>
		<?php include '../html/Head.html'?>
	</head>
	<body>
		<?php include '../php/Menus.php' ?>
		<section class="main" id="s1">
			<div id="divA">
			  <h3>Uneko VIPak zerrendatzeko REST zerbitzua</h3>
				<?php
					$curl = curl_init();
					//$url = "localhost/REST/VipUsers/";
					$url = "https://sw.ikasten.io/~T62/REST/VipUsers/";
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					$str = curl_exec($curl);
					//print_r(curl_getinfo($curl));
					echo $str;
				?>
			</div>
		</section>
		<?php include '../html/Footer.html' ?>
	</body>
</html>