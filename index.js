function clair(){
	var elements = document.getElementsByClassName('taille');
	for(var i = 0; i < elements.length; i++){
		document.getElementById('bod').style.backgroundColor = "#121212";
		elements[i].style.backgroundColor = "#121212";
		elements[i].style.color = "white";
		}
		document.getElementById('changer').innerHTML = "THÈME CLAIR";
		document.getElementById('changer').setAttribute("onclick", "sombre()");

}

function sombre(){
var elements = document.getElementsByClassName('taille');
	for(var i = 0; i < elements.length; i++){
		document.getElementById('bod').style.backgroundColor = "#FFF";
		elements[i].style.backgroundColor = "#FFF";
		elements[i].style.color = "#121212";
		}
		document.getElementById('changer').innerHTML = "THÈME SOMBRE";
		document.getElementById('changer').setAttribute("onclick", "clair()");

}