<!DOCTYPE html>
<?php include 'Segurtasuna.php'?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
  <style>
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(even) {
    background-color: #dddddd;
  }
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <?php include '../php/DbConfig.php' ?>
  <section class="main" id="s1">
      <div class="container">
        <div class="row align-items-center">

          <?php
            $esteka = mysqli_connect ($zerbitzaria, $erabiltzailea, $gakoa, $db) or die ("Errorea Dbra konektatzerakoan");
            $sql= "SELECT * FROM Question";
            $ema= mysqli_query($esteka, $sql);
            while ( $row= mysqli_fetch_array($ema, MYSQLI_ASSOC)) {
              echo '<div class="col-6">
              <p><button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse'.$row['id'].'" aria-expanded="false" aria-controls="collapseExample">'.$row['galdera'].'</button>
              </p>
              <div class="collapse" id="collapse'.$row['id'].'">
                <div class="card card-body">
                  Egilea: '.$row['email'].'<br>Erantzun zuzena: '.$row['zuzena'].'<br>Erantzun okerra 1: '.$row['okerra1'].'<br>Erantzun okerra 2: '.$row['okerra2'].'<br>Erantzun okerra 3: '.$row['okerra3'].'<br>Zailtasuna: '.$row['zailtasuna'].'<br>Gaia: '.$row['gaia'].'<br><img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['image']).'" height="60%" width="60%"/>
                </div>
              </div>
            </div>';
          }

          mysqli_free_result($ema);
          mysqli_close($esteka);
          ?>
        </div>
      </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>