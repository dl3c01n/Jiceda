

<?php


if(isset($_POST['validvalid'])){


  $login = $_POST['pseudo'];
  $last_name = $_POST['last_name'];
  $first_name = $_POST['first_name'];
  $email = $_POST['email'];
  $confirmed = false;
  $error = false;
  $valid_pseudo = false;
  $valid_first = false;
  $valid_last = false;
  
  if(preg_match('`^\w{6,12}$`',$login)){ 
  } else { 
      $error = true;
  }
  require('database.php');
  
      $query = $dbh->prepare("SELECT `pseudo` FROM Users WHERE `pseudo` = ?");
      $query->bindParam(1, $login);
      $query->execute();
      $db_result = $query->fetch();
  
  if($login === $db_result[0]){
      echo "<div class='invalid-tooltip'>
      Pseudo déjà utilisé, c'est vous? Connectez vous <a href='connexion.php'></a>
    </div>";
      $error = true;
  }else {
      $valid_pseudo = true;
  }
  
  if(preg_match('`^\w{3,12}$`',$last_name)){ 
      $valid_last = true;
  } else { 
      $error = true;
  }
  
  if(preg_match('`^\w{3,12}$`',$first_name)){ 
      $valid_first = true;
  } else { 
      $error = true;
  }
  
  
  
  if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{8,12}$#', $_POST['pwd'])) {
  
      if ($_POST['pwd'] != $_POST['confirm']) {
  
      } else {
          $confirmed = true;
  
      }
  
  } else {
  
        echo "<div class='container mt-3'>
        <div class='alert alert-danger text-center' role='alert'>
          Mot de passe non conforme aux règles de sécurités
        </div>
    </div>";
        $confirmed = false;
  
  }
  
  
  if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$email)){
      
  }
  else{
      echo "<div class='container mt-3'>
      <div class='alert alert-danger text-center' role='alert'>
        EMail non valide, veuillez retapez
      </div>
  </div>";
  
  }
  
  if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$email) && $confirmed === true && $valid_pseudo === true && $valid_last === true && $valid_first === true){
      require('database.php');
      echo "
                <div class='container mt-3'>
                    <div class='alert alert-success text-center' role='alert'>
                      Vous êtes inscrit, vous allez être redirigé vers la page de connexion
                    </div>
                </div>
                ";
                header('Refresh:3; url=connexion.php');
      $password = password_hash($_POST['pwd'], PASSWORD_DEFAULT);
      $stmt = $dbh->prepare("INSERT INTO Users (pseudo, password, lastname, firstname, email) VALUES (?,?,?,?,?)");
      $stmt->bindParam(1, $login);
      $stmt->bindParam(2, $password);
      $stmt->bindParam(3, $last_name);
      $stmt->bindParam(4, $first_name);
      $stmt->bindParam(5, $email);
      $stmt->execute();
  }
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./form.css">
    <title>Jicéda - Inscription</title>
  </head>
  <body>


    
<div class="container">
<form style="margin-top: 30px; padding: 50px;" class="needs-validation text-center" action="inscription.php" method="post" novalidate>
  <div class="form-row">
    <div class="col-md-6 mb-3 offset-md-3">
      <label for="validationTooltip01">Prénom</label>
      <input type="text" name="first_name" minlength="3" class="form-control" id="validationTooltip01" placeholder="Martin" required>
      <div class="valid-tooltip">
        Valide
      </div>

    </div>
    </div>
    <div class="form-row">
    <div class="col-md-6 mb-3 offset-md-3">
      <label for="validationTooltip01">Nom</label>
      <input type="text" name="last_name" minlength="3" class="form-control" id="validationTooltip01" placeholder="Dupont" required>
      <div class="valid-tooltip">
        Valide
      </div>
    </div>
    </div>
    <div class="form-row">
    <div class="col-md-6 mb-3 offset-md-3">
      <label for="validationTooltip01">Pseudo</label>
      <input type="text" name="pseudo" maxlength="12" minlength="6" class="form-control" id="validationTooltip01" placeholder="MDupont" required>
      <div class="valid-tooltip">
        Disponible
      </div>      
      <div class="invalid-tooltip">
          Invalide
      </div>
    </div>
    </div>
    <div class="form-row">
    <div class="col-md-6 offset-md-3 mb-3">
      <label for="validationTooltip02">Mot de passe</label>
      <input type="password" name="pwd" minlength="8" class="form-control" id="validationTooltip02" placeholder="Mot de passe" required>
      <div class="valid-tooltip">
        Sécurisé
      </div>
      <div class="invalid-tooltip">
          Non conforme
      </div>
    </div>
    </div>
    <div class="form-row">
    <div class="col-md-6 offset-md-3 mb-3">
      <label for="validationTooltipUsername">Confirmer le mot de passe</label>
      <div class="input-group">
        <input type="password" name="confirm" class="form-control" id="validationTooltipUsername" placeholder="Confirmer le mot de passe" aria-describedby="validationTooltipUsernamePrepend" required>
      </div>
    </div>
    <div class="valid-tooltip">
        Parfait!
      </div>
      <div class="invalid-tooltip">
        Le mot de passe ne correspond pas
      </div>
  </div>
  <div class="form-row">
    <div class="col-md-6 offset-md-3 mb-3">
      <label for="validationTooltip02">Email</label>
      <input type="email" name="email" class="form-control" id="validationTooltip02" placeholder="Email" required>
      <div class="valid-tooltip">
        Looks good!
      </div>
    </div>
    </div>
  <button class="btn btn-lg" name="validvalid" style="background: #1ABC9C; color: white" type="submit">S'inscrire</button>
</form>
</div>






<script>
(function() {
  'use strict';
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

