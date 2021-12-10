$( document ).ready(function(){

  $( "#osatu" ).click(function(){
		const ikaslePattern = new RegExp('^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$');
		var email = $("#email").val();
		if (ikaslePattern.test(email)) {
      $.get('../xml/Users.xml', function(datuak){
        var epostenZer = $(datuak).find('erabiltzailea');
        aurkitua=false;
        i=0;
        while(!aurkitua && i<epostenZer.length){
          if( epostenZer[i].childNodes[1].childNodes[0].nodeValue==email){
            aurkitua=true;
            $( "#izena" ).val(epostenZer[i].childNodes[3].childNodes[0].nodeValue);
            $( "#abizenak" ).val(epostenZer[i].childNodes[5].childNodes[0].nodeValue+" "+epostenZer[i].childNodes[7].childNodes[0].nodeValue);
            $( "#telf" ).val(epostenZer[i].childNodes[9].childNodes[0].nodeValue);

          }else{
            i++;
          }
        }

        if(i==epostenZer.length){
          alert("Eposta hau ez dago UPV/EHUn erregistratuta. Arren, beste bat sartu");
          $( "#izena" ).val("");
          $( "#abizenak" ).val("");
          $( "#telf" ).val("");

        }

      })
			return true;
		}else{
      alert( "Ez da ikasle baten emaila sartu" );
      $( "#izena" ).val("");
      $( "#abizenak" ).val("");
      $( "#telf" ).val("");

		}
  });

});
