<?php

function getAllUsers() {
	global$bdd;
	$users = $bdd->query('SELECT prenom, nom, email, adresse, tel, bio, avatar, dateAdhesion FROM utilisateur ORDER BY dateAdhesion DESC');
	$users->execute();
	return $users->fetchAll();
}


?>