<?php

function getAllMessagesReception() {
    global $bdd;
    $messagesdest = $bdd->query("SELECT * FROM message WHERE id_dest =".$_SESSION['id']);
    $messagesdest->execute();
    return $messagesdest->fetchAll(); 
}

function getAllMessagesEnvoie() {
    global $bdd;
    $messagesexp = $bdd->query("SELECT * FROM message WHERE id_exp = ".$_SESSION['id']);
    $messagesexp->execute();
    return $messagesexp->fetchAll(); 
}

function insertMessage($id_dest, $contenu) {
	global $bdd;
	$insertion = $bdd->prepare("INSERT INTO message (id_exp, id_dest, date_envoi, contenu) VALUES (:id_exp, :id_dest, NOW(), :contenu)");
    $insertion->bindValue(':id_exp', $_SESSION['id'], PDO::PARAM_INT);
    $insertion->bindValue(':id_dest', $id_dest, PDO::PARAM_INT);
	$insertion->bindValue(':contenu', $contenu, PDO::PARAM_STR);
	return $insertion->execute();
}

function deleteMessageWHERE($id) {
    global $bdd;
    $delete = $bdd->prepare("DELETE FROM message WHERE id = :id");
    $delete->bindValue('id', $id, PDO::PARAM_INT);
    return $delete->execute();
}

function deleteAllMessages() {
    global $bdd;
    $delete_all = $bdd->prepare("DELETE FROM message");
    return $delete_all->execute();
}

?>