<?php

if (!isset($_SESSION['id'])) {
    header('Location: http://localhost/Flipper/');
    exit();
}

require('models/profilModels.php');

if (isset($_POST['editutilisateur'])) {
    $prenom = $_POST['prenomuser'];
    $nom = $_POST['nomuser'];
    $email = $_POST['emailuser'];
    $tel = $_POST['teluser'];
    $adresse = $_POST['adresseuser'];
    $bio = $_POST['biouser'];
    if ($prenom != "" && $nom != "" && $email != "" && $tel != "" && $adresse != "" && $bio != "") {
        $requete_update_all = updateall($prenom, $nom, $email, $adresse, $tel, $bio);
        session_destroy();
        header('Location: http://localhost/Flipper/home');
    } else {
        Alerts::setFlash("<strong>Les champs ne doivent pas être vide !</strong>", "warning");
    }
}

if(isset($_FILES['avataruser']) AND !empty($_FILES['avataruser']['name'])) {
   $tailleMax = 2097152;
   $nomImage = rand(100, 1000000);
   $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   if($_FILES['avataruser']['size'] <= $tailleMax) {
      $extensionUpload = strtolower(substr(strrchr($_FILES['avataruser']['name'], '.'), 1));
      if(in_array($extensionUpload, $extensionsValides)) {
         $chemin = "avatar/".$nomImage.".".$extensionUpload;
         $resultat = move_uploaded_file($_FILES['avataruser']['tmp_name'], $chemin);
         if($resultat) {
            $updateavatar = $bdd->prepare('UPDATE utilisateur SET avatar = :avatar WHERE id = :id');
            $updateavatar->execute(array(
               'avatar' => $nomImage.".".$extensionUpload,
               'id' => $_SESSION['id']
               ));
            session_destroy();
            header('Location: http://localhost/Flipper/home');
         } else {
            $msg = "Erreur durant l'importation de votre photo de profil";
         }
      } else {
         $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
      }
   } else {
      $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
   }
}

require('views/profilView.php');

?>