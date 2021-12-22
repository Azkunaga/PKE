<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
  <meta charset="utf.8">
  <?php include '../html/Head.html'?>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/berresEgiaztapena.js"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="row">
      <div id="divA" class="col-sm-4 mx-auto">

        <form id="KodeaEmail" name="KodeaEmail" action="Berreskuratu.php" method="post" enctype="multipart/form-data" autocomplete="off">
          <div id="emailSartu" name="emailSartu">
            <label for="emailBerrez">Email</label>
            <input type="email" id="emailBerrez" class="form-control" name="emailBerrez" autocomplete="nope" placeholder="Kodigoa korreo honetara helduko da" required><br><br>
          </div>

          <div id="kodeaSartu" name="kodeaSartu" style="display: none;">
            <label for="kodea">Emaileko kodea sartu:</label>
            <input type="text" id="kodea" class="form-control" name="kodea" placeholder="Emailera heldutako kodea sartu" autocomplete="off"><br><br>
          </div>

          <div id="pasahitzaSartu" name="pasahitzaSartu" style="display: none;">
            <label for="pasB">Pasahitz berria:</label>
            <input type="password" id="pasB" class="form-control"name="pasB" minlength="8" placeholder="Pasahitza berria sartu"autocomplete="new-password"><br>
            <label for="pasBe">Pasahitz berria errepikatu:</label>
            <input type="password" id="pasBe" class="form-control" name="pasBe" placeholder="Pasahitza berriz sartu" autocomplete="new-password"><br>
          </div>
          <div class="d-grid col-12">
            <input type="submit" class="btn btn-primary" id="submit" value="OK"><br>
          </div>
        </form>
      <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {

          if(!empty($_POST['emailBerrez']) && empty($_POST['kodea']) && empty($_POST['pasB'])){
  
          $ikaslePattern = '/^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/';
          $irakaslePattern = '/^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/';
          $emaila= $_POST['emailBerrez'];
          $konexioa = new mysqli ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Ezin izan da konektatu");
    
          $eskaera = "SELECT * FROM User WHERE email = '$emaila'";
          $emaitza = $konexioa->query($eskaera);

          $errenkadak= $emaitza->num_rows;
          if($errenkadak==1){
            if(preg_match($ikaslePattern, $emaila) || preg_match($irakaslePattern, $emaila)) {
              
                $kodea= substr(md5(uniqid(mt_rand(), true)) , 0, 8);

                $_SESSION['kodea']=$kodea;
                $_SESSION['emailBerrez']=$emaila;

                echo $kodea;

                mail("$emaila", "Pashaitza berrezartzeko kodea", $kodea);

                ?>
                <script type="text/javascript">
                  $('#emailSartu').css('display','none');
                  $('#emailBerrez').prop("required", false);
                $('#kodeaSartu').css('display','block');
                $('#kodea').prop("required", true);
                </script>
               <?php
            }else{
              ?>
              <script type="text/javascript">
                  alert("Email forma konkretua behar da");
                </script>
            <?php
            }
          }else{
            ?>
              <script type="text/javascript">
                  alert("Email hori ez dago erregistratuta");
                </script>
            <?php
          }

          mysqli_free_result($emaitza);
          mysqli_close($konexioa);

        }

        if(empty($_POST['emailBerrez']) && !empty($_POST['kodea']) && empty($_POST['pasB'])) {

          $kode2=$_POST['kodea'];
          if($kode2==$_SESSION['kodea']){
            ?>
              <script type="text/javascript">
                $('#emailSartu').css('display','none');
                $('#emailBerrez').prop("required", false);
              $('#pasahitzaSartu').css('display','block');
              $('#pasB').prop("required", true);
              $('#pasBe').prop("required", true);
              </script>
              <?php
          }else{
            ?>
            <script type="text/javascript">
                alert("Kodea ez da zuzena");
                $('#emailSartu').css('display','none');
                $('#emailBerrez').prop("required", false);
              $('#kodeaSartu').css('display','block');
              $('#kodea').prop("required", true);
              </script>
          <?php
          } 
        }

        if(empty($_POST['emailBerrez']) && empty($_POST['kodea']) && !empty($_POST['pasB'])) {

          $pas1=$_POST['pasB'];
          $pas2=$_POST['pasBe'];
          if($pas1==$pas2){
            @$pasahitza=crypt($pas1);
            $konexioa = new mysqli ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Ezin izan da konektatu");
            $emailAld=$_SESSION['emailBerrez'];
            $eskaera = "UPDATE User SET pasahitza='$pasahitza' WHERE email = '$emailAld' ";
            $konexioa->query($eskaera);
            session_destroy();
            echo ("<script> alert('Pasahitza aldatu duzu!'); window.location='LogIn.php'</script>");
          }else{
            ?>
            <script type="text/javascript">
                alert("Pasahitzak ez dira berdinak");
                $('#emailSartu').css('display','none');
                $('#emailBerrez').prop("required", false);
              $('#pasahitzaSartu').css('display','block');
              $('#pasB').prop("required", true);
              $('#pasBe').prop("required", true);
              </script>
          <?php
          }
        }
        }
        
        
        ?>
    </div>
  </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
