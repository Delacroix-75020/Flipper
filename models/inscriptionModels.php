<?php

 function getUtilisateur($prenom, $nom, $email, $mdp, $adresse, $tel, $lien_web, $bio, $avatar, $dateAdhesion) {
  global $bdd;
  $requete = $bdd->prepare("INSERT INTO utilisateur (prenom, nom, email, mdp, adresse, tel, lien_web, bio, avatar, dateAdhesion) VALUES (:prenom, :nom, :email, :mdp, :adresse, :tel, :lien_web, :bio, :avatar, :dateAdhesion");
  $requete->bindValue(':prenom', $prenom, PDO::PARAM_STR); 
  $requete->bindValue(':nom', $nom, PDO::PARAM_STR);
  $requete->bindValue(':email', $email, PDO::PARAM_STR);
  $requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
  $requete->bindValue(':adresse', $adresse, PDO::PARAM_STR);
  $requete->bindValue(':tel', $tel, PDO::PARAM_STR);
  $requete->bindValue(':lien_web', $lien_web, PDO::PARAM_STR);
  $requete->bindValue(':bio', $bio, PDO::PARAM_STR);
  $requete->execute();
  return $requete->fetch();
}

 ?>