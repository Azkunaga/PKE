$( document ).ready(function(){

	$('#addquestion').click(function(){

		
		var galdera = $("#galdera").val();
		var zuzena = $("#zuzena").val();
		var okerra1 = $("#okerra1").val();
		var okerra2 = $("#okerra2").val();
		var okerra3 = $("#okerra3").val();
		var zailtasuna = $("#zailtasuna").val();
		var gaia = $("#gaia").val();
		if (galdera == "" || zuzena == "" || okerra1 == "" || okerra2 == "" || okerra3 == "" || gaia == "" || zailtasuna==""){
				alert("Ez dituzu bete bete beharreko eremuak");
				return false;
		}else{

		var data= new FormData(galderenF);
		const urlSearchParams = new URLSearchParams(window.location.search);
		const params = Object.fromEntries(urlSearchParams.entries());
		var email=params.email;		
		
		$.ajax({
			cache: false,
			url: '../php/AddQuestionWithImage.php',
			data: data,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data){
				$('#ema').text("Galdera DB-an gehitu da.\nGaldera XML fitxategian gehitu da.\nGaldera JSON fitxategian gehitu da");
				$("#img").val('');
				$("#output").css("visibility","hidden");
				$("#galdera").val('');
				$("#zuzena").val('');
				$("#okerra1").val('');
				$("#okerra2").val('');
				$("#okerra3").val('');
				$("#zailtasuna").val('');
				$("#gaia").val('');
			},
			error: function(){
				alert("Error: Galdera ez da ondo gehitu");
			}
		});

		return true;

		}
	});

  $( "#galdera" ).blur(function(){
		var galdera = $( "#galdera" ).val();
		if ( galdera.length < 10 ) {
			alert( 'Galdera motzegia da' );
			return false;
		}else{
			return true;
		}
	});
});


