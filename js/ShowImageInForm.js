var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);

	var img=	document.getElementById("img").value;
	if(img==''){
		document.getElementById("output").style="display:none";
	}else{
		document.getElementById("output").style="display:block";

	}

};

function ezabatuArgazkia(){
	document.getElementById("img").value='';
	document.getElementById("output").style="display:none";
}
