<?php

session_start();

?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">

	<title>Page d'accueil - projet reseau social</title>

</head>
<body>

	<!-- NAVBAR -->

	<?php require('../navbar.php');  ?>

	<!-- ZONES AMIS - PRINCIPALE - ABONNES -->
	<div class="container-fluid" >
		<div class="row">
			<!-- ZONE LISTE DES AMIS -->
			<div class="col-3 border taille">

			</div>
			
			<!-- ZONE PRINCIPALE -->
			<div class="col-6 text-center border taille ">
				<h1>Jicéda - logo avec un oeil fermé
				lorque l'on arrive sur la page d'accueil</h1>
				<p></p>
			</div>

			<!-- ZONE LISTE DES ABONNES -->
			<div class="col-3 border taille">
				
			</div>
		<!-- FERMETURE BALISE DIV CLASS ROW -->	
		</div>
	<!-- FERMETURE BALISE DIV CLASS CONTAINER -->
	</div>


	<!-- FOOTER -->

	<?php

	require('../footer.php');
?>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>