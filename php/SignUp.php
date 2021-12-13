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
  <script type="text/javascript" src="../js/ShowImageInForm.js"> </script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/EgiaztapenaAjax.js"> </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div id="divA">
      <form id="singUp" name="singUp" action="AddUser.php" method="post" enctype="multipart/form-data">
        <label for="erabMota">Erabiltzaile mota:</label>
        <input type="radio" id="irak" name="mota" value="irakaslea">
        <label for="irak">Irakaslea</label>
        <input type="radio" id="ikas" name="mota" value="ikaslea">
        <label for="ikas">Ikaslea</label><br><br>
        <label for="email">Email:</label>
      	<input type="text" id="email" name="email" onblur="egiaztatu(this.value)"><span class="derrigorrezkoa"> *</span><br>
        <p id="egiaztapena" name="egiaztapena"></p>
      	<br><label for="deitura">Izen abizenak:</label>
      	<input type="text" id="deitura" name="deitura" ><span class="derrigorrezkoa"> *</span><br><br>
      	<label for="zuzena">Pasahitza:</label>
      	<input type="password" id="pasahitza" name="pasahitza"><span class="derrigorrezkoa"> *</span><br><br>
      	<label for="okerra">Pasahitza errepikatu:</label>
      	<input type="password" id="pasahitza2" name="pasahitza2"><span class="derrigorrezkoa"> *</span><br><br>
        <input type="file" id="img" name="img" accept="image/*" onchange="loadFile(event)"><br>
		    <img id="output" height="100" />
        <p class="derrigorrezkoa">* Eremua betetzea derrigrrezkoa da</p><br>
        <input type="button" id="hustu_img" value="HUSTU GALDERA" onclick="ezabatuArgazkia()">
        <input type="reset" id="hustu" value="HUSTU" onclick="ezabatuArgazkia()">
        <input type="submit" id="submit" value="Erregistratu" name="Erregistratu">
      </form>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
