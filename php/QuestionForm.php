<!DOCTYPE html>
<html>
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
  <!--<script type="text/javascript" src="../js/ValidateFieldsQuestionJS.js"></script>-->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/ValidateFieldsQuestionJQ.js"> </script>

</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="divA">
      <form id="galderenF" name="galderenF" action="AddQuestion.php" method="post">
        <label for="email">Email:</label>
    	<input type="text" id="email" name="email" ><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="galdera">Galdera:</label>
    	<input type="text" id="galdera" name="galdera" ><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="zuzena">Erantzun zuzena:</label>
    	<input type="text" id="zuzena" name="zuzena"><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="okerra">Erantzun okerra:</label>
    	<input type="text" id="okerra1" name="okerra1"><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="okerra">Erantzun okerra:</label>
    	<input type="text" id="okerra2" name="okerra2"><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="okerra">Erantzun okerra:</label>
    	<input type="text" id="okerra3" name="okerra3"><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="zailtasuna">Zailtasuna:</label>
    	<select id="zailtasuna" name="zailtasuna">
    		<option value="" style="display: none;"></option>
    		<option value="1">Txikia</option>
    		<option value="2">Ertaina</option>
    		<option value="3">Handia</option>
    	</select><span class="derrigorrezkoa"> *</span><br><br>
    	<input type="text" id="gaia" name="gaia" placeholder="Galderaren gaia"><span class="derrigorrezkoa"> *</span><br><br>
        <p class="derrigorrezkoa">* Eremua betetzea derrigrrezkoa da</p><br>
        <input type="reset" id="hustu" value="HUSTU">
    	<input type="submit" id="submit" value="BIDALI" onclick="validate()">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>