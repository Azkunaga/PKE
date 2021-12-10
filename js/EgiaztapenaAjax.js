function egiaztatu(eposta){

	if($('input:radio[name=mota]:checked').val()=="ikaslea"){
		$('#egiaztapena').css("display","block");
		$.ajax({
		url: '../php/ClientVerifyEnrollment.php',
		type: 'POST',
		data: {'eposta':eposta},
		cache: false,
		success: function(data){
			if(data == "BAI"){
				$('#submit').prop("disabled",false);
				$('#egiaztapena').text("WS ikasgaian matrikulatuta dago");
				$('#egiaztapena').css("color","green");
			}else if(data == "EZ"){
				$('#submit').prop("disabled",true);
				$('#egiaztapena').text("Ez dago WS ikasgaian matrikulatuta");
				$('#egiaztapena').css("color","red");
			}
		}
		});
	}else{
		$('#egiaztapena').css("display","none");
	}
};