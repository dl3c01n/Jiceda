<?php

    // destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
    $destinataire = 'Jimmy@Duribreu.com';
     
    // copie ? (envoie une copie au visiteur)
    $copie = 'oui';
     
    // Action du formulaire (si votre page a des paramètres dans l'URL)
    // si cette page est index.php?page=contact alors mettez index.php?page=contact
    // sinon, laissez vide
    $form_action = 'contact.php';
     
    // Messages de confirmation du mail
    $message_envoye = "Message envoyé avec succès.";
    $message_non_envoye = "L'envoi du message a échoué, veuillez réessayer svp.";
     
    // Message d'erreur du formulaire
    $message_formulaire_invalide = "Erreur, vérifiez que tous les champs soient bien remplis.";
     
    /*
     * cette fonction sert à nettoyer et enregistrer un texte
     */
    function Rec($text)
    {
    	$text = htmlspecialchars(trim($text), ENT_QUOTES);
    	if (1 === get_magic_quotes_gpc())
    	{
    		$text = stripslashes($text);
    	}
     
    	$text = nl2br($text);
    	return $text;
    };
     
    /*
     * Cette fonction sert à vérifier la syntaxe d'un email
     */
    function IsEmail($email)
    {
    	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
    	return (($value === 0) || ($value === false)) ? false : true;
    }
     
    // formulaire envoyé, on récupère tous les champs.
    $nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
	$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
	$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
	$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
     
    // On va vérifier les variables et l'email ...
    $email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
    $err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
     
    if (isset($_POST['envoi']))
    {
    	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
    	{
    		// les 4 variables sont remplies, on génère puis envoie le mail
    		$headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
    		//$headers .= 'Reply-To: '.$email. "\r\n" ;
    		//$headers .= 'X-Mailer:PHP/'.phpversion();
     
    		// envoyer une copie au visiteur ?
    		if ($copie == 'oui')
    		{
    			$cible = $destinataire.';'.$email;
    		}
    		else
    		{
    			$cible = $destinataire;
    		};
     
    		// Remplacement de certains caractères spéciaux
    		$message = str_replace("&#039;","'",$message);
    		$message = str_replace("&#8217;","'",$message);
    		$message = str_replace("&quot;",'"',$message);
    		$message = str_replace('&lt;br&gt;','',$message);
    		$message = str_replace('&lt;br /&gt;','',$message);
    		$message = str_replace("&lt;","&lt;",$message);
    		$message = str_replace("&gt;","&gt;",$message);
    		$message = str_replace("&amp;","&",$message);
     
    		// Envoi du mail
    		$num_emails = 0;
    		$tmp = explode(';', $cible);
    		foreach($tmp as $email_destinataire)
    		{
    			if (mail($email_destinataire, $objet, $message, $headers))
    				$num_emails++;
    		}
     
    		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
    		{
                echo "
                <div class='container mt-3'>
                    <div class='alert alert-success text-center' role='alert'>
                      ".$message_envoye."
                    </div>
                </div>
                ";
    		}
    		else
    		{
    			echo "
                <div class='container mt-3'>
                    <div class='alert alert-danger text-center' role='alert'>
                      ".$message_non_envoye."
                    </div>
                </div>
                ";
    		};
    	}
    	else
    	{
    		// une des 3 variables (ou plus) est vide ...
    		echo "
                <div class='container mt-3'>
                    <div class='alert alert-warning text-center' role='alert'>
                      ".$message_formulaire_invalide."
                    </div>
                </div>
                ";
    		$err_formulaire = true;
    	};
    }; // fin du if (!isset($_POST['envoi']))
     
   /*if (($err_formulaire) || (!isset($_POST['envoi'])))
    {*/
    	// afficher le formulaire

        echo"

            <div class='container'>
                <div id='bloccenter'>
                    <h1 class='lead-login h5 mb-3 font-weight-normal text-center'>Se connecter</h1>
                    <form action='".$form_action."' method='POST' class='needs-validation' novalidate>
                        <div class='form-group'>
                            <label for='sujetcontact'>Destinataire :</label>
                            <input class='form-control' type='text' placeholder='Jimmy@Duribreu.com' readonly>
                            <label for='nom'>Votre nom :</label>
                            <input type='text' class='form-control' id='nom' name='nom' value='".stripslashes($nom)."' required>
                            <div class='invalid-feedback'>
                                Veuillez indiquer votre nom.
                            </div>
                            <label for='mailexped'>Votre adresse e-mail</label>
                            <input type='email' class='form-control' id='mailexped' aria-describedby='emailHelp' placeholder='Contact@Exemple.com' name='email' value='".stripslashes($email)."' required>
                            <div class='invalid-feedback'>
                                Veuillez indiquer votre adresse e-mail.
                            </div>
                            <small id='emailHelp' class='form-text text-muted'>Votre adresse e-mail ne sera jamais partagée.</small>
                            <label for='sujetcontact'>Objet :</label>
                            <select class='form-control' id='sujetcontact' name='objet'>
                                <option>Nous contacter</option>
                                <option>Rapporter un bug</option>
                            </select>
                            <label for='contacttext'>Message :</label>
                            <textarea class='form-control' id='contacttext' rows='10' name='message' required>".stripslashes($message)."</textarea>
                            <div class='invalid-feedback'>
                                Veuillez saisir un message.
                            </div>
                            <div id='blocbtnvalid'>
                                <button type='submit' class='btn btn-lg' name='envoi'>Envoyer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        ";
   /*};*/

?>