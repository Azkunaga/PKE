<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
    <div>
		<?php
			$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
			$sql="INSERT INTO Question(email,galdera,zuzena,okerra1,okerra2,okerra3,zailtasuna,gaia) VALUES('$_POST[email]', '$_POST[galdera]', '$_POST[zuzena]', '$_POST[okerra1]',
			'$_POST[okerra2]', '$_POST[okerra3]', $_POST[zailtasuna], '$_POST[gaia]')";
			$ema = mysqli_query($esteka, $sql);
			if (!$ema) {
				echo "<br><br><p><a href='QuestionFormWithImage.php'>Berriro saiatu!</a></p><br><br>";
				die('Errorea query-a gauzatzerakoan: '.mysqli_error($esteka));
			}
			echo "Galdera bat gehitu da!<br><br>";
			echo "<p><a href='ShowQuestions.php'>Galderak ikusteko</a></p>";
			mysqli_close($esteka);
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
