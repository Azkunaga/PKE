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
		<div class="row">
			<div class="col-sm-4 mx-auto">
				<div id="divA">
					<form id="Login" name="login" method="post" action="LogIn.php" enctype="multipart/form-data">
						<fieldset>
							<legend>Saio hasiera panela</legend><br>
							<div class="mb-3">
							  <input type="email" class="form-control" id="emaillogin" name="emaillogin" placeholder="Sartu zure email-a">
							</div>
							<div class="mb-3">
							  <input type="password" class="form-control" id="passwordlogin" name="passwordlogin" placeholder="Sartu zure pasahitza">
							</div>
							<div class="d-grid col-12">
								<input type="submit" value="Saioa Hasi" class="btn btn-primary" id="submitlogin" name="submitlogin">
								<a href="Berrezkuratu.php">Pasahitza ahaztu duzu?</a><br>
							</div>
						</fieldset>
					</form>
					<div class="d-grid col-12">
						<button class="btn btn-primary" onclick="window.location='SignUp.php'">Erregistratu</button>
					</div>
				</div>
			</div>
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
