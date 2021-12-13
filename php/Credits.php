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

	.imgizq{
		float:left; /*para ponerlo a la izquierda */
		margin:20px; /* un margen cualquiera */
	}
	.imgizq img, .imgder img{
		display: block;
		margin: 0 auto; /* centrar imagen */
	}
	.imgizq p, .imgder p{
		text-align:center; 
		font-weight:bold; 
		font-size: 14px; 
	}
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>
	
      <h2>EGILEAK</h2>
	  <p> Gu Aritz Azkunaga eta Aritz Plazaola gara, Software Ingeniaritzako bi ikasle. Aritz Azkunaga Gasteizen bizi da, Aritz Plazaola berriz, Oñatin.</p>

    </div>
	<div class="imgizq">
		<img src="../images/azku.jpg" height="400" width="400">
		<p>Aritz Azkunaga</p>
		
	</div>
	<div class="imgder">
		<img src="../images/poxito.jpg" height="400" width="400">
		<p>Aritz Plazaola</p>
	</div>
	<div>
		<p id="demo"></p>
		<div id="mapholder"></div>
		<script>
			var x = document.getElementById('demo');
			function getLocation() {
			  if (navigator.geolocation) {		  
				//console.log(navigator.geolocation);
				navigator.geolocation.getCurrentPosition(showPosition);
			  } else {
				x.innerHTML = "Geolocation is not supported by this browser.";
			  }
			}

			function showPosition(position) {
			  x.innerHTML = "Latitude: " + position.coords.latitude +
			  "<br>Longitude: " + position.coords.longitude;
			}
		
			getLocation();
		</script>		 
	</div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
