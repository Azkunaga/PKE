<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
	<meta charset="utf.8">
	<?php include '../html/Head.html'?>
</head>
<body>
	<?php include '../php/Menus.php' ?>
	<section class="main" id="s1">
    <div id="divA">
			<form id="Login" name="login" method="post" action="LogIn.php" enctype="multipart/form-data">
				<fieldset>
					<legend>Saio hasiera panela</legend><br>
					<label for="emaillogin">Email:</label>
					<input type="email" id="emaillogin" name="emaillogin"><br><br>
					<label for="passwordlogin">Password:</label>
					<input type="password" id="passwordlogin" name="passwordlogin"><br><br>
					<input type="submit" value="Saioa Hasi" id="submitlogin" name="submitlogin"><br><br>
				</fieldset>
			</form>
		</div>
	</section>
	<?php
	include '../php/DbConfig.php';
	if(isset($_POST['emaillogin'])){
		$konexioa = new mysqli ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Ezin izan da konektatu");
		$erabemail = $_POST['emaillogin'];
		$pasahitza = $_POST['passwordlogin'];
		//$pasahitza = crypt($_POST['pasahitza'],CRYPT_SHA512);
		$eskaera = "SELECT * FROM User WHERE email = '$erabemail' and egoera='aktibo'";
		$emaitza = $konexioa->query($eskaera);
		if(!$emaitza){
			die("Errorea querya gauzatzerakoan. ").$emaitza->error;
		}else{
			$errenkadak = $emaitza->num_rows;
			$konexioa->close();
			if($errenkadak==1){
				$row=$emaitza->fetch_object();
				if(hash_equals($row->pasahitza, crypt($pasahitza, $row->pasahitza))){
					include 'IncreaseGlobalCounter.php';
					$_SESSION['email'] = $erabemail;
					$_SESSION['erabMota'] = $row->mota;
					echo ("<script> alert('Saioa hasi duzu! Ongi etorri'); window.location='Layout.php'</script>");
				}else{
					echo("<script> alert('Errorea kautotzerakoan, hash desberdina')</script>");
				}
				
			}else{
				echo("<script> alert('Errorea kautotzerakoan')</script>");
			}
		}
	}
	?>
	<?php include '../html/Footer.html' ?>
</body>
</html>
