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

  <script type="text/javascript" src="../js/ValidateFieldsQuestionJQ.js"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"> </script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="row">
    <div id="divA" class="col-sm-6 mx-auto">
      <form id="galderenF" name="galderenF" action="AddQuestionWithImage.php?" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="galdera">Galdera</label>
          <input type="text" id="galdera" name="galdera" class="form-control" placeholder="Sartu galdera">
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
        <div class="mb-3" id="irudiaDiv">
          <img id="defaultImg" src="../images/iconoPaisaje.png" onclick="document.getElementById('img').click()" height="100"/>
          <input type="file" id="img" name="img" class="form-control-file" accept="image/*" onchange="loadFile(event)">
          <img id="output" src="../images/iconoPaisaje.png" />
          <input type="button" class="btn btn-primary btn-lg" id="hustu_img" value="HUSTU ARGAZKIA" onclick="ezabatuArgazkia()">
        </div>
        <div class="d-grid col-12">
          <input type="reset" id="hustu" class="btn btn-primary btn-lg" value="HUSTU" onclick="ezabatuArgazkia()"><br>
          <input type="submit" id="submit" class="btn btn-primary btn-lg" value="BIDALI">
        </div>
      </form>
    </div>
  </div>
  </section>

  <?php include '../html/Footer.html' ?>
</body>
</html>
