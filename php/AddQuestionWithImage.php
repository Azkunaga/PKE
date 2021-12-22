<!DOCTYPE html>
<?php include 'Segurtasuna.php' ?>
<html>
<head>
  <?php include '../html/Head.html'?>

</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
  	 <!-- Modal -->
  <div class="modal fade show" id="besteBatSortu" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Galderak Ikusi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-footer">
          <button type="submit" id="submit" class="btn btn-primary">Galdera gehitu</button>
          <button type="button" class="btn btn-primary">Beste galdera bat sortu</button>
        </div>
      </div>
    </div>
  </div>
    <div>
		<?php
			$hutsa = '/^\s*$/';
			$emaila = $_SESSION['email'];
			if(!preg_match($hutsa,$emaila) && !preg_match($hutsa, $_POST['galdera']) && !preg_match($hutsa, $_POST['zuzena']) && !preg_match($hutsa, $_POST['okerra1']) && !preg_match($hutsa, $_POST['okerra2']) && !preg_match($hutsa, $_POST['okerra3']) && !preg_match($hutsa,$_POST['zailtasuna']) && !preg_match($hutsa, $_POST['gaia'])){
			//isset($_POST['email']) && isset($_POST['galdera']) && isset($_POST['zuzena']) && isset($_POST['okerra1']) && isset($_POST['okerra2']) && isset($_POST['okerra3']) && isset($_POST['zailtasuna']) && isset($_POST['gaia'])

				$ikaslePattern = '/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/';
				$irakaslePattern = '/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/';

				if(preg_match($ikaslePattern, $emaila) || preg_match($irakaslePattern, $emaila)) {
					if(strlen($_POST['galdera'])>10){
						if(!empty($_FILES["img"]["name"])){
							// Argazkiaren datuak
							$fileName = basename($_FILES["img"]["name"]);
							$fileType = pathinfo($fileName, PATHINFO_EXTENSION);
							// Allow certain file formats
							$allowTypes = array('png','jpg','jpeg','gif');
							if(in_array($fileType, $allowTypes)){
								$image = $_FILES['img']['tmp_name'];
								$imgContent = addslashes(file_get_contents($image));
							}else{
								echo "<br><br><p><a href='QuestionFormWithImage.php'>Berriro saiatu!</a></p><br><br>";
								die("Arazoak egon dira irudiarekin. Igotzen saiatu zaren argazkiaren mota ez da onartzen, JPG, JPEG, PNG, edo GIF motekin proba ezazu.");
							}
						}else {
							$imgContent=null;
						}

						$esteka = mysqli_connect($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
						$sql="INSERT INTO Question(email,galdera,zuzena,okerra1,okerra2,okerra3,zailtasuna,gaia,image) VALUES('$_GET[email]', '$_POST[galdera]', '$_POST[zuzena]', '$_POST[okerra1]',
						'$_POST[okerra2]', '$_POST[okerra3]', $_POST[zailtasuna], '$_POST[gaia]', '$imgContent')";
						$ema = mysqli_query($esteka, $sql);
						if (!$ema) {
							echo "<br><br><p><a href='QuestionFormWithImage.php'>Berriro saiatu!</a></p><br><br>";
							die("Errorea query-a gauzatzerakoan: ".mysqli_error($esteka));
						}else{
							echo "Galdera bat gehitu da datu-basean!<br><br>";
							echo "<p><a href='ShowQuestionsWithImage.php'>Galderak ikusteko</a></p>";
							mysqli_close($esteka);
              ?>
              <script>
                var modal = document.getElementById('besteBatSortu');
                console.log(modal);
                modal.className="modal fade show";
              </script>
            <?php
						}
					}else{
						echo "<br><br><p><a href='QuestionFormWithImage.php'>Berriro saiatu!</a></p><br><br>";
						die("Galdera motzegia da. Gutxienez 10eko luzera");
					}
				}else{
					echo "<br><br><p><a href='QuestionFormWithImage.php'>Berriro saiatu!</a></p><br><br>";
					die("Emailak ez du patroia betetzen");
				}
			}else{
				echo "<br><br><p><a href='QuestionFormWithImage.php'>Berriro saiatu!</a></p><br><br>";
				die("Derrigorrezko eremuak ez dira bete");
			}
		?>
    </div>
   
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
