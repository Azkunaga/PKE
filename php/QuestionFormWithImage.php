<!DOCTYPE html>
<html>
<?php include 'Segurtasuna.php'?>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">
    #divA{
      border-style: none;
      width: 350px;
      margin: auto;
    }

	.derrigorrezkoa{
		color: red;
	}
  </style>

  <!--<script type="text/javascript" src="../js/ValidateFieldsQuestionJS.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/ValidateFieldsQuestionJQ.js"> </script>-->
  <script type="text/javascript" src="../js/ShowImageInForm.js"> </script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1" style="overflow: auto;">
    <div id="divA">
      <form id="galderenF" name="galderenF" action="AddQuestionWithImage.php?email=$email" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="email">Email:</label><span class="derrigorrezkoa"> *</span>
        	<input type="text" class="form-control" id="email" name="email" placeholder="Sartu zure email-a" onblur="validateEmail()">
        </div>
        <div class="mb-3">
          <label for="galdera">Galdera:</label><span class="derrigorrezkoa"> *</span>
        	<input type="text" id="galdera" name="galdera" class="form-control" onblur="validateGaldera()">
        </div>
        <div class="mb-3">
          <label for="zuzena">Erantzun zuzena:</label><span class="derrigorrezkoa"> *</span>
        	<input type="text" id="zuzena" name="zuzena" class="form-control">
        </div>
        <div class="mb-3">
          <label for="okerra">Erantzun okerra:</label><span class="derrigorrezkoa"> *</span>
        	<input type="text" id="okerra1" name="okerra1" class="form-control">
        </div>
        <div class="mb-3">
          <label for="okerra">Erantzun okerra:</label><span class="derrigorrezkoa"> *</span>
        	<input type="text" id="okerra2" name="okerra2" class="form-control">
        </div>
        <div class="mb-3">
          <label for="okerra">Erantzun okerra:</label><span class="derrigorrezkoa"> *</span>
        	<input type="text" id="okerra3" name="okerra3" class="form-control">
        </div>
        <div class="mb-3">
          <label for="zailtasuna">Zailtasuna:</label><span class="derrigorrezkoa"> *</span>
        	<select id="zailtasuna" name="zailtasuna" class="form-select">
        		<option value="" style="display: none;"></option>
        		<option value="1">Txikia</option>
        		<option value="2">Ertaina</option>
        		<option value="3">Handia</option>
          </select>
        </div>
        <div class="mb-3">
          <input type="text" id="gaia" name="gaia" class="form-control" placeholder="Galderaren gaia"><span class="derrigorrezkoa"> *</span><br><br>
        </div>

        <input type="file" id="img" name="img" class="form-control-file" accept="image/*" onchange="loadFile(event)"><br><br>
		    <img id="output" height="100" />
        <p class="derrigorrezkoa">* Eremua betetzea derrigrrezkoa da</p><br>
        <input type="button" class="btn btn-primary" id="hustu_img" value="HUSTU ARGAZKIA" onclick="ezabatuArgazkia()">
        <input type="reset" id="hustu" class="btn btn-primary" value="HUSTU" onclick="ezabatuArgazkia()">
        <input type="submit" id="submit" class="btn btn-primary" value="BIDALI">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
