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
						$sql="INSERT INTO Question(email,galdera,zuzena,okerra1,okerra2,okerra3,zailtasuna,gaia,image) VALUES('$emaila', '$_POST[galdera]', '$_POST[zuzena]', '$_POST[okerra1]',
						'$_POST[okerra2]', '$_POST[okerra3]', $_POST[zailtasuna], '$_POST[gaia]', '$imgContent')";
						$ema = mysqli_query($esteka, $sql);
						if (!$ema) {
							echo "<br><br><p><a href='QuestionFormWithImage.php'>Berriro saiatu!</a></p><br><br>";
							die("Errorea query-a gauzatzerakoan: ".mysqli_error($esteka));
						}else{
							echo "Galdera bat gehitu da datu-basean!<br><br>";
							echo "<p><a href='ShowQuestionsWithImage.php'>Galderak ikusteko</a></p>";
							mysqli_close($esteka);

							$xml = simplexml_load_file('../xml/Questions.xml');
							$assessmentItem = $xml->addChild('assessmentItem');
							$assessmentItem->addAttribute('author', $emaila);
							$assessmentItem->addAttribute('subject', $_POST['gaia']);
							$itemBody = $assessmentItem->addChild('itemBody');
							$itemBody->addChild('p', $_POST['galdera']);
							$correctResponse = $assessmentItem->addChild('correctResponse');
							$correctResponse->addChild('response',$_POST['zuzena']);
							$incorrectResponses = $assessmentItem->addChild('incorrectResponses');
							$incorrectResponses->addChild('response',$_POST['okerra1']);
							$incorrectResponses->addChild('response',$_POST['okerra2']);
							$incorrectResponses->addChild('response',$_POST['okerra3']);
							$xml->asXML('../xml/Questions.xml');

							echo "Galdera bat gehitu da xml fitxategian!<br><br>";
							echo "<p><a href='ShowXmlQuestions.php'>Galderak ikusteko</a></p>";

              $data=file_get_contents("../json/Questions.json");
              $array=json_decode($data);
              $assessmentItemJson = new stdClass();
              $assessmentItemJson->subject=$_POST['gaia'];
              $assessmentItemJson->author=$emaila;
              $assessmentItemJson->itemBody->p=$_POST['galdera'];
              $assessmentItemJson->correctResponse->response=$_POST['zuzena'];
              $assessmentItemJson->incorrectResponses->response[0]=$_POST['okerra1'];
              $assessmentItemJson->incorrectResponses->response[1]=$_POST['okerra2'];
              $assessmentItemJson->incorrectResponses->response[2]=$_POST['okerra3'];

              $galderaarray[0] = $assessmentItemJson;
              array_push($array->assessmentItems, $galderaarray[0]);

              $jsonData = json_encode($array);
              $jsonData = str_replace('{', '{'.PHP_EOL, $jsonData);
              $jsonData = str_replace(',', ','.PHP_EOL, $jsonData);
              $jsonData = str_replace('}', PHP_EOL.'}', $jsonData);
              file_put_contents("../json/Questions.json",$jsonData);

              echo '<br>Galdera bat JSON fitxategian gehitu da<br>';
              echo "<p><a href='ShowJsonQuestions.php'>Galderak ikusteko</a></p>";
              ?>

              <script>
                var modal = document.getElementById('besteBatSortu');
                console.log(modal);
                modal.style.display="block";
                //modal.style.paddingRight = "17px";
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
    <!-- Modal -->
  <div class="modal fade" id="besteBatSortu" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
