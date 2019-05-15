<link rel="stylesheet" type="text/css" href="./style.css">

<body id="bod">
<div class="container taille" style="margin-top: 30px;">
    <div class="row">
        <div class="col-sm-12 col-md-12 offset-lg-3 offset-xl-3 col-lg-6 col-xl-6 ">
            <div class="card text-center">
              <div class="card-body">
                <H3>Le site Jiceda est édité par :</H3>
                <br>
                <p>JCD GROUP <br>
                300 Rue des Wetz<br/>
59500 DOUAI</p>
              </div>
            </div>
          </div>
      </div>
      <br>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-lg-3 offset-xl-3">
            <div class="card text-center">
              <div class="card-body">
                <h3>Le site Jiceda a été réalisé par :</h3>
                <p>JCD Group, Société Anonyme à Responsabilité Limitée,<br> Dont le siège social est établi
                300 Rue des Wetz 59500 DOUAI<br/>
                Immatriculée au Registre du Commerce et des Sociétés SIRET 01234567891011</p>
                </div>
            </div>
          </div>
      </div>

     
      <br>
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 offset-lg-3 offset-xl-3">
            <div class="card text-center">
              <div class="card-body taille">
                <h3>Le site Jiceda est hébergé par :</h3>
                    <p>OVH, Société Anonyme par Actions Simplifiées,<br> au capital de 200.000 euros, dont le siège social est établi : <br>
                    140 Quai du Sartel - 59100 ROUBAIX<br/>
                    immatriculée au Registre du Commerce et des Sociétés sous le numéro RCS 482 652 401 PARIS</p>
                </div>
            </div>
          </div>
      </div>
    </div>


    <script>
var lmts = document.getElementsByClassName('card-body');
    for(var v = 0; v < lmts.length; v++){
      lmts[v].style.backgroundColor = "#121212";
    }

		function changeColor(){
	var elements = document.getElementsByClassName('taille');
	for(var i = 0; i < elements.length; i++){
		document.getElementById('bod').style.backgroundColor = "#FFF";
		elements[i].style.backgroundColor = "#FFF";
		elements[i].style.color = "black";
    }
    var sec_lmt = document.getElementsByClassName('card-body');
    for(var v = 0; v < sec_lmt.length; v++){
      sec_lmt[v].style.backgroundColor = "#FFF";
    }
		}
  </script>
  </body>