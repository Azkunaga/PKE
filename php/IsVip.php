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
				
			  <form id="isvip" name="isvip" action="IsVip.php" method="post">
				<fieldset>
					<legend>Erabiltzaile bat VIPa den identifikatzeko REST bezeroa</legend><br>
					<label for="email">Email:</label>
					<input type="text" id="email" name="email"></span>
					<input type="submit" id="submit" value="VIPa da?" name="VIPa da?"><br><br>
				</fieldset>
			  </form>
			  
				<?php
					if($_SERVER['REQUEST_METHOD']=="POST" && !empty($_POST['email'])){
						$curl = curl_init();
						//$url = "http://localhost/REST/VipUsers/".$_POST['email'];
						$url = "https://sw.ikasten.io/~T62/REST/VipUsers/".$_POST['email'];
						curl_setopt($curl, CURLOPT_URL, $url);
						curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
						$str = curl_exec($curl);
						//print_r(curl_getinfo($curl));
						echo $str;
					}
				?>
			</div>
		</section>
		<?php include '../html/Footer.html' ?>
	</body>
</html>

