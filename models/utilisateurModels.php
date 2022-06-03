<?php

function getAllUsers() {
	global $bdd;
	$users = $bdd->query('SELECT id, prenom, nom, email, adresse, tel, bio, avatar, dateAdhesion FROM utilisateur WHERE role = 0 ORDER BY dateAdhesion DESC');
	$users->execute();
	return $users->fetchAll();
}

function deleteUserWhere($id) {
    global $bdd;
    $delete = $bdd->prepare("DELETE FROM utilisateur WHERE id = :id");
    $delete->bindValue('id', $id, PDO::PARAM_INT);
    return $delete->execute();
}

function getFollowedUserIds($id_follower){
	global $bdd;
	$followeds = $bdd->query('SELECT id_followed FROM follower WHERE id_follower = '.$id_follower);
	$followeds->execute();
	return $followeds->fetchAll();
}

function checkContainUser($followedUsers, $id_user){
	foreach($followedUsers as $user){
		if($user['id_followed'] == $id_user){

			return true;

		}
	}
	return false;
}

function insertFollow($id_followed, $id_follower){
	global $bdd;
	$insert_follow = $bdd->prepare("INSERT INTO follower VALUES (:id_followed, :id_follower)");
	$insert_follow->bindValue(':id_followed', $id_followed, PDO::PARAM_INT);
	$insert_follow->bindValue(':id_follower', $id_follower, PDO::PARAM_INT);
	return $insert_follow->execute();

}

function deleteFollow($id_followed, $id_follower){
	global $bdd;
	$delete_follow = $bdd->prepare("DELETE FROM follower where id_followed = :id_followed AND id_follower = :id_follower");
	$delete_follow->bindValue(':id_followed', $id_followed, PDO::PARAM_INT);
	$delete_follow->bindValue(':id_follower', $id_follower, PDO::PARAM_INT);
	return $delete_follow->execute();
}

?>