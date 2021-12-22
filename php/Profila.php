<!DOCTYPE html>
<?php include 'Segurtasuna.php'?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
  <style>
    body {
      text-align: center;
    }

    #back{
      padding: 0;
      border: none;
      background: none;
      text-align: left;
    }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
      <div style="padding: 0px; margin: 0px; width: 100%">
        <div class="row align-items-center" style="padding: 0px; margin: 0px;">
          <div class="col-12" style="padding: 0px; margin: 0px;">
          <?php
            $erabemail = $_SESSION['email'];
            $esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
            $sql= "SELECT * FROM User WHERE email = '$erabemail'";
            $ema= mysqli_query($esteka, $sql);
            $row= mysqli_fetch_array($ema, MYSQLI_ASSOC);
            $nireGalderak = rand(0, 1000);
            $galderaGuztiak = rand(1001, 20000);
              echo '<div style="width: 100%; background-color:#228FF2;"><br><img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['image']).'" style=" border-radius:50%; height: 25%; width: 25%; padding-top: 0.5em"/><br></div><br>
                  <h2>'.$row['deitura'].'</h2><br><h4>'.$row['mota'].'</h4><br><div class="row align-items-center">
          <div class="col-6">Nire galderak: '.$nireGalderak.'</div><div class="col-6">Galdera guztiak: '.$galderaGuztiak.'</div><br><br><br>';

          mysqli_free_result($ema);
          mysqli_close($esteka);
          ?>

          </div>
        </div>
      </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>