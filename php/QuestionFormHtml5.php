<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
		<form id="galderenF" name="galderenF" action="AddQuestion.php" method="post"> <!-- action="AddQuestion.php"-->
        <label for="email">Email:</label>
    	<input type="email" pattern="([a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es))|([a-z]+(\.[a-z]+)?@ehu\.(eus|es))" id="email" name="email"><span class="derrigorrezkoa"> *</span><br><br> <!-- required onblur="validateEmail()" -->
    	<label for="galdera">Galdera:</label>
    	<input type="text" id="galdera" name="galdera" required minlength="10"><span class="derrigorrezkoa"> *</span><br><br> <!-- required onblur="validateGaldera()" -->
    	<label for="zuzena">Erantzun zuzena:</label>
    	<input type="text" id="zuzena" name="zuzena" required><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="okerra">Erantzun okerra:</label>
    	<input type="text" id="okerra1" name="okerra1" required><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="okerra">Erantzun okerra:</label>
    	<input type="text" id="okerra2" name="okerra2" required><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="okerra">Erantzun okerra:</label>
    	<input type="text" id="okerra3" name="okerra3" required><span class="derrigorrezkoa"> *</span><br><br>
    	<label for="zailtasuna">Zailtasuna:</label>
    	<select id="zailtasuna" name="zailtasuna" required>
    		<option value="" style="display: none;"></option>
    		<option value="1">Txikia</option>
    		<option value="2">Ertaina</option>
    		<option value="3">Handia</option>
    	</select><span class="derrigorrezkoa"> *</span><br><br>
    	<input type="text" id="gaia" name="gaia" placeholder="Galderaren gaia" required><span class="derrigorrezkoa"> *</span><br><br>
        <p class="derrigorrezkoa">* Eremua betetzea derrigrrezkoa da</p><br>
        <input type="reset" id="hustu" value="HUSTU">
    	<input type="submit" id="submit" value="BIDALI" onclick="validate()">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
