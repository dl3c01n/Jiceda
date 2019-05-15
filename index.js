function changeColor(){
	var elements = document.getElementsByClassName('taille');
	for(var i = 0; i < elements.length; i++){
		document.getElementById('bod').style.backgroundColor = "#FFF";
		elements[i].style.backgroundColor = "#FFF";
		elements[i].style.color = "black";
		}
		}