<!DOCTYPE html>
<?php include "SegurtasunaIkasleaIrakaslea.php" ?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style>
	#divA{
		width: 400px;
		margin: auto;
		border-style: double;
		border-width: medium;
    }

	.derrigorrezkoa{
		color: red;
	}

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
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/AddQuestionAjax.js"></script>
  <script type="text/javascript" src="../js/ShowQuestionsAjax.js"></script>
  <script type="text/javascript" src="../js/ShowImageInForm.js"></script>
  <!--<script type="text/javascript" src="../js/JsonQuestionsCounter.js"></script>-->
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1" style="overflow: auto;">
	<div>
		<input type="button" id="jsongalderak" value="Ikusi JSON galderak" onclick="JsonBistaratu()">
		<input type="button" id="addquestion" value="Galdera gehitu"></br></br>
    <p id="txtHint"></p>
		<p>Kautotutako erabiltzaile kopurua: <span id="kautotuak"></span></p>
		<p>Nire galderak/Galdera guztiak (json): <span id="galderaKop"></span></p><br>
    <script type="text/javascript">
      $( document ).ready(function(){
        function kontatu(){
          $.ajaxSetup({ cache: false });
          $.getJSON( "../json/Questions.json", function( data ) {
            var zureKontagailu = 0;
            var email = "<?php echo $_SESSION['email']; ?>";
            for(var i=0; i < data.assessmentItems.length; i++){
              if(email == data.assessmentItems[i].author){
                zureKontagailu++;
              }
            }
            $('#galderaKop').text(zureKontagailu + "/" + data.assessmentItems.length);
          });
        }
        kontatu();  
        setInterval(kontatu, 10000);
      });
    </script>
	</div>
	<script type="text/javascript">
    function kontagailuaBistaratu(){
      xhro = new XMLHttpRequest();
      xhro.onreadystatechange= function (){
        if (xhro.readyState==4){
          //alert (xhro.responseText); // xml dok. string moduan bistaratu
          var erantzuna= xhro.responseXML;
          var obj = document.getElementById("kautotuak");
          var x= erantzuna.getElementsByTagName('kontagailua')[0];
		      obj.innerHTML= x.childNodes[0].childNodes[0].nodeValue;
        }
      }
      xhro.open("GET",'../xml/UserCounter.xml');
      xhro.send(null);
    }
    kontagailuaBistaratu();
    setInterval(kontagailuaBistaratu,10000);
  </script>
    <div id="divA">
      <form id="galderenF" name="galderenF" enctype="multipart/form-data">
        <!--<label for="email">Email:</label>
      	<input type="text" id="email" name="email" onblur="validateEmail()"><span class="derrigorrezkoa"> *</span><br>-->
      	<label for="galdera">Galdera:</label>
      	<input type="text" id="galdera" name="galdera"><span class="derrigorrezkoa"> *</span><br><br>
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
        <input type="file" id="img" name="img" accept="image/*" onchange="loadFile(event)"><br>
		    <img id="output" height="100px" />
        <p class="derrigorrezkoa">* Eremua betetzea derrigrrezkoa da</p><br>
        <input type="button" id="hustu_img" value="HUSTU ARGAZKIA" onclick="ezabatuArgazkia()">
        <input type="reset" id="hustu" value="HUSTU" onclick="ezabatuArgazkia()">
        <!--<input type="button" id="submit" value="BIDALI">-->
      </form>
    </div>
    <div>
      <p id="ema"></p><br><br>
      <div id="divJson" style='visibility:hidden;'>
        <table id="jsonTaula">
			<thead>
				<tr>
					<th>Egilea</th>
					<th>Galdera</th>
					<th>Erantzun zuzena</th>
				</tr>
			</thead>
			<tbody>
			
			</tbody>
        </table>
      </div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
