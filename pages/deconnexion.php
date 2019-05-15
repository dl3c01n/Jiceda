<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php

session_start();
unset($_SESSION['login']);
session_destroy();

echo "<div class='alert alert-danger'>Vous êtes déconnecté ! </div>";
header("Refresh:3; url=accueil.php");

?>

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