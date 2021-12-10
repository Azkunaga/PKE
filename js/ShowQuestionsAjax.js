function JsonBistaratu(){
	xhro = new XMLHttpRequest();
	xhro.onreadystatechange= function (){
		if (xhro.readyState==4){
			document.getElementById("divJson").style.visibility = 'visible';
			var erantzuna= JSON.parse(xhro.responseText);
			var taula= document.getElementById('jsonTaula').getElementsByTagName('tbody')[0];
			taula.innerHTML = "<tr></tr>";
			for(var i=0; i < erantzuna.assessmentItems.length; i++){
				var newRow = taula.insertRow();
				var newEmailCell = newRow.insertCell();
				var newGalderaCell = newRow.insertCell();
				var newZuzenaCell = newRow.insertCell();
				
				var email = document.createTextNode(erantzuna.assessmentItems[i].author);
				var galdera = document.createTextNode(erantzuna.assessmentItems[i].itemBody.p);
				var zuzena = document.createTextNode(erantzuna.assessmentItems[i].correctResponse.response);

				newEmailCell.appendChild(email);
				newGalderaCell.appendChild(galdera);
				newZuzenaCell.appendChild(zuzena);
			}
		}
	}
	
	xhro.open("GET",'../json/Questions.json?fiktizioa='+ new Date().getTime(), true);
	xhro.send(null);
}
