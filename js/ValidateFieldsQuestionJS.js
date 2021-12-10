function validate(){
	var email = document.getElementById("email").value;
	var galdera = document.getElementById("galdera").value;
	var zuzena = document.getElementById("zuzena").value;
	var okerra1 = document.getElementById("okerra1").value;
	var okerra2 = document.getElementById("okerra2").value;
	var okerra3 = document.getElementById("okerra3").value;
	var zailtasuna = document.getElementById("zailtasuna").value;
	var gaia = document.getElementById("gaia").value;
	var ikaslePattern = /^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$/;
	var irakaslePattern = /^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$/;

	if(email == "" || galdera == "" || zuzena == "" || okerra1 == "" || okerra2 == "" || okerra3 == "" || gaia == "" || zailtasuna=="" ){
			alert("Ez dituzu bete bete beharreko eremuak");
			return false;
	}else{
		if (!ikaslePattern.test(email) && !irakaslePattern.test(email)){
			alert("Emaila gaizki sartuta");
			return false;
		} else {
			if (document.getElementById("galdera").value.length<=10) {
				alert("Galdera motzegia da");
				return false;
			}else{
				return true;
			}
		}
	}
}
