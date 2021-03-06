<?php

function insertEvent($titre, $contenu, $url_video, $dateEvent, $id_user) {
	global $bdd;
	$events = $bdd->prepare("INSERT INTO evenement (titre, contenu, url_video, dateEvent, dateCreationEvent, id_user) VALUES (:titre, :contenu, :url_video, :dateEvent, CURDATE(), :id_user)");
	$events->bindValue(':titre', $titre, PDO::PARAM_STR);
	$events->bindValue(':contenu', $contenu, PDO::PARAM_STR);
	$events->bindValue(':url_video', $url_video, PDO::PARAM_STR);
	$events->bindValue(':dateEvent', $dateEvent, PDO::PARAM_STR);
	$events->bindValue(':id_user', $id_user, PDO::PARAM_STR);
	return $events->execute();
}

function insertInterest($id_user, $id_event){
	global $bdd;
	$insert_interest = $bdd->prepare("INSERT INTO interest (id_user, id_event) VALUES (:id_user, :id_event)");
	$insert_interest->bindValue(':id_user', $id_user, PDO::PARAM_INT);
	$insert_interest->bindValue(':id_event', $id_event, PDO::PARAM_INT);
	return $insert_interest->execute();
}

function isInterested($id_user, $id_event){
	global $bdd;
	$Interested = $bdd->query("SELECT count(id_user) as nbr FROM interest WHERE id_user = ".$id_user." AND id_event =".$id_event);
	$Interested->execute();
	$result =  $Interested->fetch();
	$nbr = $result['nbr'];
	return $nbr > 0;

}

function deleteInterest($id_user, $id_event){
	global $bdd;
	$Interested = $bdd->query("DELETE FROM interest WHERE id_user = ".$id_user." AND id_event =".$id_event);
	$Interested->execute();

}

function deleteEvent($id_event){
	global $bdd;
	$Interested = $bdd->query("DELETE FROM evenement WHERE id = ".$id_event.";");
	$Interested->execute();

}

function getAllEventsUsers($id_event){
	global $bdd;
	$events = $bdd->query("SELECT * from events_users where id =".$id_event.";");
	$events->execute();
	return $events->fetchAll();
}

/*function selectInterestByEvent($id_event){
	global $bdd;
	$interestByEvents = $bdd->query("SELECT id_user , avatar from interest, utilisateur where utilisateur.id = interest.id_user AND id_event =".$id_event);
	$interestByEvents->execute();
	return $interestByEvents->fetchAll();
}*/

function getAllEvent(){
	global $bdd;
	$events = $bdd->query("SELECT evenement.id, prenom, nom, avatar, titre, contenu, url_video, dateEvent, dateCreationEvent, id_user from utilisateur, evenement where utilisateur.id = evenement.id_user ORDER BY id DESC; ");
	$events->execute();
	return $events->fetchAll();
}

function getIdMessage(){
	global $bdd;
	$message = $bdd->query("SELECT id FROM evenement ");
	$message->execute();
	return $message->rowCount();
}

function getFollowed(){
	global $bdd;
	$followeds = $bdd->query("SELECT count(id_followed) as nb_followed FROM follower WHERE id_follower = ".$_SESSION['id']);
	$followeds->execute();
	return $followeds->fetchAll();
}

function getFollower(){
	global $bdd;
	$followers = $bdd->query("SELECT count(id_follower) as nb_follower FROM follower WHERE id_followed= ".$_SESSION['id']);
	$followers->execute();
	return $followers->fetchAll();
}

?>