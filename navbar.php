<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="./style.css">

<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" style="color: #1ABC9C !important"><?php if(isset($_SESSION['login'])){ echo "Bonjour ". $_SESSION['login'];} ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse text-uppercase justify-content-end" id="navbarTogglerDemo01">
		    <ul class="navbar-nav">
		    	<li class="nav-item active">
		        	<img src="">
		    	</li>
		     	<li class="nav-item active">
		        	<a class="nav-link" href="Accueil.php">home<span class="sr-only">(current)</span></a>
		    	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="profil.php">mon profil</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="#">messagerie privée</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" onclick="changeColor()" id="changer" href="#">thème clair</a>
		      	</li>
		      	<!-- <li class="nav-item">
		        	<a class="nav-link" href="inscription.php">inscription</a>
		      	</li>
		      	<li class="nav-item">
		        	<a class="nav-link" href="connexion.php">s'identifier</a>
				  </li> -->
				  
				  <?php
					if(isset($_SESSION['login'])){
						echo "<li class='nav-item'>
						<a class='nav-link' href='deconnexion.php'>Se déconnecter</a>
					  </li>";
					}else{
						echo "<li class='nav-item'>
						<a class='nav-link' href='inscription.php'>inscription</a>
					  </li>
					  <li class='nav-item'>
						<a class='nav-link' href='connexion.php'>s'identifier</a>
					  </li>";
					}
				  ?>
		    </ul>
		    
		</div>
	<!-- FERMETURE BALISE NAV -- NAVBAR -->  
	</nav>

	<script>
		function changeColor(){
	var elements = document.getElementsByClassName('taille');
	for(var i = 0; i < elements.length; i++){
		document.getElementById('bod').style.backgroundColor = "#121212";
		elements[i].style.backgroundColor = "#121212";
		elements[i].style.color = "white";
		}
		}
	</script>