<!DOCTYPE html>
<?PHP session_start(); ?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  	body{
  		text-align: center;
  	}
  </style>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="container">
	
      <h2>Nortzuk gara?</h2>
	  <div class="row align-items-start">
		  <div class="col-4">
			<img class="img-responsive" src="../images/azku.jpg" style="width: 20vmax; ">
			<p>Aritz Azkunaga</p>
		  </div>
		  <div class="col-4">
			<img class="img-responsive" src="../images/poxito.jpg" style="width: 20vmax">
			<p>Aritz Plazaola</p>
		  </div>
		  <div class="col-4">
			<img class="img-responsive" src="../images/jon.jpg" style="width: 20vmax">
			<p>Jon Jauregi</p>
		  </div>
	  </div>

	  <div class="container">
	  	<h2>Kontaktua</h2>
	  	<div class="row align-items-start">
	  		<div class="col">
	  			<p>Emaila: </p>
	  		</div>
	  		<div class="col">
	  			<p>quiz.jokoa@ehu.eus</p>
	  		</div>
	  	</div>
	  	<div class="row align-items-star">
	  		<div class="col">
	  			<p>Telefonoa: </p>
	  		</div>
	  		<div class="col">
	  			<p>943 01 80 00</p>
	  		</div>
	  	</div>
	  	<div class="row align-items-start">
	  		<div class="col">
	  			<p>Gure sare sozialak: </p>
	  		</div>
	  		<div class="col">
	  			<a href="https://www.facebook.com/upvehu/" class="fa fa-facebook"></a>
	  			<a href="https://twitter.com/upvehu" class="fa fa-twitter"></a>
	  			<a href="https://www.instagram.com/ikubokontseilu/" class="fa fa-instagram"></a>
	  		</div>
	  	</div>
	  </div>

	  <div class="container">
			<h2>Helburua</h2>
			<p>Quiz motako joko bat egitea. Erregistratu eta saio hasi ezkero galderak sortzea eta ikustea.</p>
	  </div>
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
