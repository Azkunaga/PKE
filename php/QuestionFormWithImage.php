<!DOCTYPE html>
<html>
<?php include 'Segurtasuna.php'?>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">

  .derrigorrezkoa{
    color: red;
  }
  </style>

  <script type="text/javascript" src="../js/ValidateFieldsQuestionJS.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"> </script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="row">
    <div id="divA" class="col-sm-6 mx-auto">
      <form id="galderenF" name="galderenF" action="AddQuestionWithImage.php?email=$email" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="galdera">Galdera</label>
          <input type="text" id="galdera" name="galdera" class="form-control" onblur="validateGaldera()" placeholder="Sartu galdera">
        </div>
        <div class="mb-3">
          <label for="zuzena">Erantzun zuzena</label>
          <input type="text" id="zuzena" name="zuzena" class="form-control" placeholder="Erantzun zuzena jarri">
        </div>
        <div class="mb-3">
          <label for="okerra">Erantzun okerra</label>
          <input type="text" id="okerra1" name="okerra1" class="form-control" placeholder="Erantzun okerra jarri">
        </div>
        <div class="mb-3">
          <label for="okerra">Erantzun okerra</label>
          <input type="text" id="okerra2" name="okerra2" class="form-control" placeholder="Beste erantzun oker bat jarri">
        </div>
        <div class="mb-3">
          <label for="okerra">Erantzun okerra</label>
          <input type="text" id="okerra3" name="okerra3" class="form-control" placeholder="Beste erantzun oker bat jarri">
        </div>
        <div class="mb-3">
          <label for="zailtasuna">Zailtasuna</label>
          <select id="zailtasuna" name="zailtasuna" class="form-select">
            <option value="" style="display: none;"></option>
            <option value="1">Txikia</option>
            <option value="2">Ertaina</option>
            <option value="3">Handia</option>
          </select>
        </div>
        <div class="mb-3">
          <input type="text" id="gaia" name="gaia" class="form-control" placeholder="Galderaren gaia"><br><br>
        </div>
        <div style="display: flex;">
          <img id="defaultImg" src="../images/iconoPaisaje.png" onclick="document.getElementById('img').click()" height="100"/>
          <input type="file" id="img" name="img" class="form-control-file" accept="image/*" onchange="loadFile(event)" style="display: none">
          <img id="output" src="../images/iconoPaisaje.png" />
          <input type="button" style="height: 30%;"class="btn btn-primary" id="hustu_img" value="HUSTU ARGAZKIA" onclick="ezabatuArgazkia()">
        </div><br>
        <div class="d-grid col-12">
          <input type="reset" id="hustu" class="btn btn-primary" value="HUSTU" onclick="ezabatuArgazkia()"><br>
          <input type="submit" id="submit" class="btn btn-primary" value="BIDALI">
        </div>
      </form>
    </div>
  </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
