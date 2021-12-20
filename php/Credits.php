<!DOCTYPE html>
<?PHP session_start(); ?>
<html>
<head>
  <?php include '../html/Head.html'?>
  <style type="text/css">
	.imgder{
		float:right; /*para ponerlo a la derecha */
		margin:20px; /* un margen cualquiera */
	}

	.imgcen{
		float:center; /*para ponerlo a la derecha */
		margin:20px; /* un margen cualquiera */
	}

	.imgizq{
		float:left; /*para ponerlo a la izquierda */
		margin:20px; /* un margen cualquiera */
	}
	.imgizq img, .imgder img, .imgcen img{
		display: block;
		margin: 0 auto; /* centrar imagen */
	}
	.imgizq p, .imgder p, .imgcen p{
		text-align:center; 
		font-weight:bold; 
		font-size: 14px; 
	}

	.fa {
	  padding: 20px;
	  font-size: 30px;
	  width: 50px;
	  text-align: center;
	  text-decoration: none;
	  margin: 5px 2px;
	}

	.fa-facebook {
	  background: #3B5998;
	  color: white;
	}

	.fa-twitter {
	  background: #55ACEE;
	  color: white;
	}

	.fa-instagram {
	  background: #125688;
	  color: white;
	}
  </style>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div class="container">
	
      <h2>Nortzuk gara?</h2>
	  <div class="row align-items-start">
		  <div class="col">
			<img class="img-responsive" src="../images/azku.jpg" style="width: 20vmax; ">
			<p>Aritz Azkunaga</p>
		  </div>
		  <div class="col">
			<img class="img-responsive" src="../images/poxito.jpg" style="width: 20vmax">
			<p>Aritz Plazaola</p>
		  </div>
		  <div class="col">
			<img class="img-responsive" src="../images/poxito.jpg" style="width: 20vmax"> <!--Jon sartu zure argazkia -->
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
