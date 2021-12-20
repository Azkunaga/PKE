function emailB(){
	const ikaslePattern = new RegExp('^[a-z]+[0-9]{3}@ikasle\.ehu\.(eus|es)$');
	const irakaslePattern = new RegExp('^[a-z]+(\.[a-z]+)?@ehu\.(eus|es)$');
	var email = $("#emailBerrez").val();
	if (!ikaslePattern.test(email) && !irakaslePattern.test(email)) {
		alert( "Emaila gaizki sartuta" );
		return false;
	}else{
		$('#KodeaEmail').css('display','none');
		$('#KodeaSartu').css('display','block');
		return true;
	}
}