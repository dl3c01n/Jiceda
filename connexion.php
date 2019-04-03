<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Connexion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="../stylus.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

	<div class='container'>
    	
    	<div id='bloccenter'>

			<div id="loginmodule">

				<h1 class="lead-login h5 mb-3 font-weight-normal text-center">Se connecter</h1>

				<form method="post" action="connexion.php" class="needs-validation" novalidate>
					<label for="login">Login :</label>
					<input type="text" name="login" id="login" maxlength="12" class="form-control mb-2" required placeholder="Login">
					<div class="invalid-feedback">
		            	Login requis.
		            </div>
					<label for="pass">Mot de passe :</label>
					<input type="password" name="pass" id="pass" maxlength="12" class="form-control mb-2" required placeholder="Mot de passe">
					<div class="invalid-feedback">
		            	Mot de passe requis.
		            </div>
					<div id="blocbtnvalid">
						<button type='submit' class='btn btn-lg' name='valid'>Connexion</button>
					</div>
					<p class="infoinput text-center"></p>
				</form>

			</div>

		</div>

	</div>

	<script src="verifs.js"></script>

</body>

</html>

<?php


include "dbconnect.php";

if (isset($_POST["valid"])) {

	$login = $_POST["login"];
    $realpass = $_POST['pass'];
	require('database.php');
	$queque = $dbh->prepare("SELECT `password` FROM Users WHERE `pseudo` = ?");
    $queque->bindParam(1, $login);
    $queque->execute();
	$hashed = $queque->fetch();
    if(password_verify($realpass ,$hashed['password'])){
		echo "Vous êtes loggé";
		header("Refresh:3; url=index.php");
    }else {
        echo "n'est pas bon";
    }

}
?>