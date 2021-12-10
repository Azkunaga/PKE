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
				
			  <form id="addvip" name="addvip" action="AddVip.php" method="post" enctype="multipart/form-data">
				<fieldset>
					<legend>VIP erabiltzaile-zerrendari eposta bat gehitzeko REST bezeroa</legend><br>
					<label for="email">Email:</label>
					<input type="text" id="email" name="email"></span>
					<input type="submit" id="submit" value="VIPa bihurtu" name="VIPa bihurtu"><br><br>
				</fieldset>
			  </form>
			  
				<?php
					if($_SERVER['REQUEST_METHOD']=="POST"){
						$ch = curl_init();
						//curl_setopt($ch, CURLOPT_URL, "http://localhost/REST/VipUsers/");
						curl_setopt($ch, CURLOPT_URL, "https://sw.ikasten.io/~T62/REST/VipUsers/");
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						curl_setopt($ch, CURLOPT_POST, true);
						$data = array(
							'eposta'=>$_POST['email']
						);
						curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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