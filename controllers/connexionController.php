<?php

  require "models/connexionModels.php";
 
if (isset($_POST['formconnexion'])) {
   
    if (!empty($_POST['email'])) {
      
        if (!empty($_POST['pass'])) {
       
            $email = $_POST['email'];
            $pass = sha1($_POST['pass']);
            $requete = getUtilisateur($email, $pass);
            if ($requete) { 
            	
                    $_SESSION['id'] = $requete['id'];
                    $_SESSION['prenom'] = $requete['prenom'];
                    $_SESSION['nom'] = $requete['nom'];
                    $_SESSION['adresse'] = $requete['adresse'];
                    $_SESSION['tel'] = $requete['tel'];
                    $_SESSION['bio'] = $requete['bio'];
                    $_SESSION['email'] = $requete['email'];
                    $_SESSION['pass'] = $requete['pass'];
                    $_SESSION['avatar'] = $requete['avatar'];
                    $_SESSION['dateAdhesion'] = $requete['dateAdhesion'];
                    $_SESSION['lvl'] = 1;
                    header('Location: post');
                
            } else {
                Alerts::setFlash("Identifiants incorrects.", "danger");
            }
        } else {
            Alerts::setFlash("Veuillez saisir votre mot de passe", "warning");
        }
    } else {
        Alerts::setFlash("Veuillez saisir votre pseudo", "warning");
    }
}


  require "views/connexionView.php";
?>