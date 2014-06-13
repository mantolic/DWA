function showOffer(id) {
	var request = false;
	try {
		request = new XMLHttpRequest();
	} catch (ms) {
		try {
			request = new ActvieXObject("Msxml2.XMLHTTP");
		} catch (ms2) {
			request = new ("Microsoft.XMLHTTP");
		}
	}
	  	
  request.open("GET", "php/script.php?id="+id,true);
	request.onreadystatechange = function() {
		if(request.readyState == 4 && request.status == 200) {
			document.getElementById("ispis").innerHTML = request.responseText;
		}
	}
	
	request.send(null);
};