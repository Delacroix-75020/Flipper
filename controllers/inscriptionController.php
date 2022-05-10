<?php

  require "models/inscriptionModels.php";


if(isset($_POST['forminscription'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $pass = sha1($_POST['pass']);
    $pass2 = sha1($_POST['pass2']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $tel = htmlspecialchars($_POST['tel']);
    $lien_web = "NULL";
    $avatar = "NULL";
    $dateAdhesion = date('y-m-d');
    $bio = htmlspecialchars($_POST['bio']);
    if(!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['pass']) AND !empty($_POST['pass2']) AND !empty($_POST['adresse']) AND !empty($_POST['tel']) AND !empty($_POST['bio'])) {
       $prenomlength = strlen($prenom);
       if($prenomlength <= 255) {
          if($email == $email2) {
             if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $reqemail = $bdd->prepare("SELECT * FROM utilisateur WHERE email = ?");
                $reqemail->execute(array($email));
                $emailexist = $reqemail->rowCount();
                if($emailexist == 0) {
                   if($pass == $pass2) {
                      $insertmbr = $bdd->prepare("INSERT INTO utilisateur(prenom, nom, email, mdp, adresse, tel, lien_web, bio, avatar, dateAdhesion) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                      $insertmbr->execute(array($prenom, $nom, $email, $pass, $adresse, $tel, $lien_web, $bio, $avatar, $dateAdhesion));
                      $erreur = "Votre compte a bien été créé !</a>";
                   } else {
                      $erreur = "Vos mots de passes ne correspondent pas !";
                   }
                } else {
                   $erreur = "Adresse email déjà utilisée !";
                }
             } else {
                $erreur = "Votre adresse email n'est pas valide !";
             }
          } else {
             $erreur = "Vos adresses email ne correspondent pas !";
          }
       } else {
          $erreur = "Votre username ne doit pas dépasser 255 caractères !";
       }
    } else {
       $erreur = "Tous les champs doivent être complétés !";
    }
 }
    require "views/inscriptionView.php";
?>