<!DOCTYPE html>
<html lang="fr">

<head>
  <title>Connexion</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="./stylus.css">
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

        $bdd = connectDb();
        $query = $bdd->prepare("SELECT COUNT(*) FROM users WHERE pseudo = '" . $login . "';");
        $query->execute();
        $data = $query->fetch();
        $query->closeCursor();

        if ($data["COUNT(*)"] > 0) {

                $pass = $_POST["pass"];

                $bdd = connectDb();
                $query = $bdd->prepare("SELECT password FROM users WHERE pseudo = '" . $login . "';");
                $query->execute();
                $data = $query->fetch();
                $query->closeCursor();

                if (password_verify($pass, $data["password"])) {

                        //session_start();
						$_SESSION["login"] = $login;
						echo "Vous êtes connecté, vous allez être redirigé vers l'accueil";
                        //header("Refresh:3; url=127.0.0.1/pages/accueil.php");

                } else {

                        echo "Mot de passe incorrect.";

                }

        } else {

                echo "Login incorrect.";

        }

}
?>