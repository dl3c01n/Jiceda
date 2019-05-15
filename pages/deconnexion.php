<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php

session_start();
unset($_SESSION['login']);
session_destroy();

echo "<div class='alert alert-danger'>Vous êtes déconnecté ! </div>";
header("Refresh:3; url=accueil.php");

?>