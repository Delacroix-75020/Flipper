<?php

function updateall($prenom, $nom, $email, $adresse, $tel, $bio){
	global $bdd;
	$requete_update_all = $bdd->prepare("UPDATE utilisateur SET prenom = :prenom , nom = :nom, email = :email, adresse = :adresse, tel = :tel, bio = :bio WHERE id = ".$_SESSION['id']);
	$requete_update_all->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	$requete_update_all->bindValue(':nom', $nom, PDO::PARAM_STR);
	$requete_update_all->bindValue(':email', $email, PDO::PARAM_STR);
	$requete_update_all->bindValue(':adresse', $adresse, PDO::PARAM_STR);
	$requete_update_all->bindValue(':tel', $tel, PDO::PARAM_STR);
	$requete_update_all->bindValue(':bio', $bio, PDO::PARAM_STR);
	return $requete_update_all->execute();
}



function updateAvatar($avatar){
	global $bdd;
	$requete_update_all = $bdd->prepare("UPDATE utilisateur SET avatar = :avatar WHERE id = ".$_SESSION['id']);
	return $requete_update_all->execute();
}

function updateNom($nom) {
	global $bdd;
	$requete_update_nom = $bdd->prepare("UPDATE utilisateur SET nom = :nom WHERE id = ".$_SESSION['id']);
	$requete_update_nom->bindValue(':nom', $nom, PDO::PARAM_STR);
	return $requete_update_nom->execute();
}

function updatePrenom($prenom) {
	global $bdd;
	$requete_update_prenom = $bdd->prepare("UPDATE utilisateur SET prenom = :prenom WHERE id = ".$_SESSION['id']);
	$requete_update_prenom->bindValue(':prenom', $prenom, PDO::PARAM_STR);
	return $requete_update_prenom->execute();
}

function updateTel($tel) {
	global $bdd;
	$requete_update_tel = $bdd->prepare("UPDATE utilisateur SET tel = :tel WHERE id = ".$_SESSION['id']);
	$requete_update_tel->bindValue(':tel', $tel, PDO::PARAM_STR);
	return $requete_update_tel->execute();
}

function updateAdresse($adresse) {
	global $bdd;
	$requete_update_adresse = $bdd->prepare("UPDATE utilisateur SET adresse = :adresse WHERE id = ".$_SESSION['id']);
	$requete_update_adresse->bindValue(':adresse', $adresse, PDO::PARAM_STR);
	return $requete_update_adresse->execute();
}

function updatebio($bio) {
	global $bdd;
	$requete_update_cp = $bdd->prepare("UPDATE utilisateur SET bio = :bio WHERE id = ".$_SESSION['id']);
	$requete_update_cp->bindValue(':bio', $bio, PDO::PARAM_STR);
	return $requete_update_cp->execute();
}

function checkEmail($email) {
	global $bdd;
	$requete_email_exist = $bdd->prepare("SELECT * FROM utilisateur WHERE email = :email");
	$requete_email_exist->bindValue(':email', $email, PDO::PARAM_STR);
	$requete_email_exist->execute();
	return $requete_email_exist->fetchAll();
}

function updateEmail($email) {
	global $bdd;
	$requete_update_email = $bdd->prepare("UPDATE utilisateur SET email = :email WHERE id = ".$_SESSION['id']);
	$requete_update_email->bindValue(':email', $email, PDO::PARAM_STR);
	return $requete_update_email->execute();
}

function checkMdp($mdp) {
	global $bdd;
	$requete_mdp_user = $bdd->prepare("SELECT mdp FROM utilisateur WHERE mdp = :mdp");
	$requete_mdp_user->bindValue(':mdp', $mdp, PDO::PARAM_STR);
	$requete_mdp_user->execute();
	return $requete_mdp_user->fetch();
}

function updateMdp($newmdp) {
	global $bdd;
	$requete_update_mdp = $bdd->prepare("UPDATE utilisateur SET mdp = :mdp WHERE id = ".$_SESSION['id']);
	$requete_update_mdp->bindValue(':mdp', $newmdp, PDO::PARAM_STR);
	return $requete_update_mdp->execute();
}

function checkUser($email, $mdp) {
	global $bdd;
	$requete_check_user = $bdd->prepare("SELECT * FROM utilisateur WHERE email = :email AND mdp = :mdp");
	$requete_check_user->bindValue(':email', $email, PDO::PARAM_STR);
	$requete_check_user->bindValue(':mdp', $mdp, PDO::PARAM_STR);
	$requete_check_user->execute();
	return $requete_check_user->fetchAll();
}

function deleteUser() {
	global $bdd;
	$delete_account = $bdd->prepare("DELETE FROM utilisateur WHERE id = ".$_SESSION['id']);
	return $delete_account->execute();
}

?>