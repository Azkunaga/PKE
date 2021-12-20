<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>

  <script type="text/javascript" src="../js/ShowImageInForm.js"> </script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/EgiaztapenaAjax.js"> </script>
</head>

<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="row">
      <div class="col-sm-6 mx-auto">
      <form id="singUp" name="singUp" action="AddUser.php" method="post" enctype="multipart/form-data">
          <label for="erabMota">Erabiltzaile mota:</label><br><br>
          <input type="radio" id="irak" name="mota" value="irakaslea">
          <label for="irak">Irakaslea</label> &nbsp; &nbsp; &nbsp;
          <input type="radio" id="ikas" name="mota" value="ikaslea">
          <label for="ikas">Ikaslea</label><br><br>
          <label for="email">Email</label><br>
        	<input type="text" class="form-control" id="email" name="email" placeholder="Sartu zure email-a"><br>
        	<br><label for="deitura">Izen abizenak</label><br>
        	<input type="text" class="form-control" id="deitura" name="deitura" placeholder="Sartu zure izen eta abizenak"><br><br>
        	<label for="zuzena">Pasahitza</label><br>
        	<input type="password" class="form-control" id="pasahitza" name="pasahitza" placeholder="Sartu zure pasahitza"><br><br>
        	<label for="okerra">Pasahitza errepikatu</label><br>
        	<input type="password" class="form-control" id="pasahitza2" name="pasahitza2" placeholder="Sartu berriz zure pasahitza"><br><br>
          <div style="display: flex;">
            <img id="defaultImg" src="../images/iconoPaisaje.png" onclick="document.getElementById('img').click()" height="100"/>
            <input type="file" id="img" name="img" class="form-control-file" accept="image/*" onchange="loadFile(event)" style="display: none">
            <img id="output" src="../images/iconoPaisaje.png" />
            <input type="button" style="height: 30%;"class="btn btn-primary" id="hustu_img" value="HUSTU ARGAZKIA" onclick="ezabatuArgazkia()">
          </div><br>
          <div class="d-grid col-12">
            <input type="reset" id="hustu" class="btn btn-primary" value="HUSTU" onclick="ezabatuArgazkia()"><br>
            <input type="submit" id="submit" class="btn btn-primary" value="ERREGISTRATU" name="Erregistratu">
          </div>


      </form>
      </div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
