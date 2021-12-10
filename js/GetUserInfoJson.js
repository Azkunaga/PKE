$( document ).ready(function(){

  $( "#osatu" ).click(function(){
		const ikaslePattern = new RegExp('^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$');
		var email = $("#email").val();
		if (ikaslePattern.test(email)) {
      console.log("if 1");
      $.getJSON("../json/Users.json", function (data) {
        aurkitua=false;
        i=0;
        while(!aurkitua && i<data.erabiltzaileak.length){
          console.log("while");
          if(data.erabiltzaileak[i].eposta==email){
            aurkitua=true;
            $( "#izena" ).val(data.erabiltzaileak[i].izena);
            $( "#abizenak" ).val(data.erabiltzaileak[i].abizena1+" "+data.erabiltzaileak[i].abizena2);
            $( "#telf" ).val(data.erabiltzaileak[i].telefonoa);
          }else{
          i++;
          }
        }

        if(i==data.erabiltzaileak.length){
          alert("Eposta hau ez dago UPV/EHUn erregistratuta. Arren, beste bat sartu");
          $( "#izena" ).val("");
          $( "#abizenak" ).val("");
          $( "#telf" ).val("");
        }

      })

    }else{
      alert( "Ez da ikasle baten emaila sartu" );
      $( "#izena" ).val("");
      $( "#abizenak" ).val("");
      $( "#telf" ).val("");
    }

  });

});
