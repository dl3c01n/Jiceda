var lmts = document.getElementsByClassName('card-body');
    for(var v = 0; v < lmts.length; v++){
      lmts[v].style.backgroundColor = "#121212";
    }

function changeColor(){
    document.getElementById('bod').style.backgroundColor = "#white";
    var sec_lmt = document.getElementsByClassName('card-body');
    for(var v = 0; v < sec_lmt.length; v++){
      sec_lmt[v].style.backgroundColor = "white";
      sec_lmt[v].style.color = "#000";
    }
		}