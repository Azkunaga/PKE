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
    $hutsa = '/^\s*$/';
	//print_r($_POST);
    if(isset($_POST['mota']) && !preg_match($hutsa, $_POST['email']) && !preg_match($hutsa, $_POST['deitura']) && !preg_match($hutsa, $_POST['pasahitza']) && !preg_match($hutsa, $_POST['pasahitza2'])){

      $emaila = $_POST['email'];
      $ikaslePattern = '/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/';
      $irakaslePattern = '/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/';
      $deiturak = '/^[A-Z][a-z]+(\s[A-Z][a-z]+)+$/';
      $mota=$_POST['mota'];

      if((preg_match($ikaslePattern, $emaila) && $mota=="ikaslea") || (preg_match($irakaslePattern, $emaila) && $mota=="irakaslea")) {
        if(preg_match($deiturak, $_POST['deitura'])){
          if(strlen($_POST['pasahitza'])>=8){
            if($_POST['pasahitza']==$_POST['pasahitza2']){
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
              
          		$esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
              $pasahitza= crypt($_POST['pasahitza']);
          		$sql="INSERT INTO User(mota,email,deitura,pasahitza,image,egoera) VALUES('$_POST[mota]', '$_POST[email]', '$_POST[deitura]', '$pasahitza', '$imgContent', 'aktibo')";
        			$ema = mysqli_query($esteka, $sql);  
        			if (!$ema) {
        				echo "<p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
        				die('Errorea query-a gauzatzerakoan: '.mysqli_error($esteka));
        			}
        			echo "Erregisratu zara!<br><br>";
              echo "<p><a href='LogIn.php'>Saioa hasi</a></p><br><br>";
        			mysqli_close($esteka);
            }else{
              echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
              die('Pasahitzak ez dira berdinak');
            }
          }else{
            echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
            die('Pasahitza gutxienez 8ko luzera izan behar du');
          }
        }else{
          echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
          die('Deituraren formatua ez da egokia');
        }
      }else{
        echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
        die('Emailak ez du patroia betetzen');
      }
    }else{
      echo "<br><br><p><a href='SignUp.php'>Berriro saiatu!</a></p><br><br>";
      die("Derrigorezko eremuak ez dira bete");
    }
		?>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
