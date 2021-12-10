$( document ).ready(function(){
	function kontatu(){
		$.ajaxSetup({ cache: false });
		$.getJSON( "../json/Questions.json", function( data ) {
			var zureKontagailu = 0;
			/*const urlSearchParams = new URLSearchParams(window.location.search);
			const params = Object.fromEntries(urlSearchParams.entries());
			var email=params.email;*/
			var email = '<?php echo $_SESSION['email']; ?>';
			console.log(email);
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