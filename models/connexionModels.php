<?php

 
function getUtilisateur($email, $mdp) {
	global $bdd;
	$requete = $bdd->prepare("SELECT * FROM utilisateur WHERE email = :email AND mdp= :mdp");
	$requete->bindValue(':email', $email, PDO::PARAM_STR);
	$requete->bindValue(':mdp', $mdp, PDO::PARAM_STR);
	$requete->execute();
	return $requete->fetch();
}

?>