$( document ).ready(function(){

  $( "#email" ).blur(function(){
		const ikaslePattern = new RegExp('^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$');
		const irakaslePattern = new RegExp('^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$');
		var email = $("#email").val();
		if (!ikaslePattern.test(email) && !irakaslePattern.test(email)) {
			alert( "Emaila gaizki sartuta" );
			return false;
		}else{
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

  $("#submit").click(function(){
		var email = $("#email").val();
		var galdera = $("#galdera").val();
		var zuzena = $("#zuzena").val();
		var okerra1 = $("#okerra1").val();
		var okerra2 = $("#okerra2").val();
		var okerra3 = $("#okerra3").val();
		var zailtasuna = $("#zailtasuna").val();
		var gaia = $("#gaia").val();
		if (email == "" || galdera == "" || zuzena == "" || okerra1 == "" || okerra2 == "" || okerra3 == "" || gaia == "" || zailtasuna==""){
				alert("Ez dituzu bete bete beharreko eremuak");
				return false;
		}else{
				return true;
			}
	});

});
