jQuery(document).ready(function($){
	// Oraingo path-a lortu eta hurrengoa aurkitu
	var path = window.location.pathname.split("/").pop();

	// Hasierako orrialdea lortu
	if ( path == '' ) {
		path = '../php/Layout.php';
	}

	var kendu = $('.offcanvas-body ul li a');
	for(var i = 0; i < kendu.length; i++) {
  		kendu[i].classList.remove('active');
	}


	var target = $('.offcanvas-body ul li a[href="'+path+'"]');
	// Ezarri helmugako gisa

	target.addClass('active');

	var izenburua= $('#izenburua');
	console.log(izenburua);

	if(path.includes("Layout")){
		izenburua.text("Quiz Jokoa");
	}else if(path.includes("Credits")){
		izenburua.text("Kredituak");
	}else if(path.includes("QuestionForm")){
		izenburua.text("Sortu Galdera");
	}else if(path.includes("Show")){
		izenburua.text("Galderak Ikusi");
	}else if(path.includes("Profila")){
		izenburua.text("Profila");
	}else if(path.includes("LogIn")){
		izenburua.text("Saioa Hasi");
	}else if(path.includes("SignUp")){
		izenburua.text("Erregistratu");
	}
});