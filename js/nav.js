jQuery(document).ready(function($){
	// Oraingo path-a lortu eta hurrengoa aurkitu
	var path = window.location.pathname.split("/").pop();

	// Hasierako orrialdea lortu
	if ( path == '' ) {
		path = '../php/Layout.php';
	}

	var target = $('#navbarTogglerDemo01 ul li a[href="'+path+'"]');
	// Ezarri helmugako gisa
	target.parent().addClass('active');
});