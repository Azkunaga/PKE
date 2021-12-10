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
				<form id="deletevip" name="deletevip" action="DeleteVip.php" method="post">
				<fieldset>
					<legend>VIP erabiltzailea ezabatzeko REST bezeroa</legend><br>
					<label for="email">Email:</label>
					<input type="text" id="email" name="email"></span>
					<input type="submit" id="submit" value="Ezabatu" name="Ezabatu"><br><br>
				</fieldset>
			  </form>
				<?php
					if($_SERVER['REQUEST_METHOD']=="POST"){
						$ch = curl_init();
						//curl_setopt($ch, CURLOPT_URL, "localhost/REST/VipUsers/".$_POST['email']);
						curl_setopt($ch, CURLOPT_URL, "https://sw.ikasten.io/~T62/REST/VipUsers/".$_POST['email']);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
						$output = curl_exec($ch);
						echo $output;
						curl_close($ch);
					}
				?>
			</div>
		</section>
		<?php include '../html/Footer.html' ?>
	</body>
</html>