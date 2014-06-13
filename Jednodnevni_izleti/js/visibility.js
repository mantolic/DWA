function showForm(_id) {	
	var x = document.getElementById(_id);
	x.style.zIndex = 999;
	x.style.visibility = 'visible';
}

function hideForm(_id) {
	var x = document.getElementById(_id);
	x.style.zIndex = -999;
	x.style.visibility = 'hidden';
}