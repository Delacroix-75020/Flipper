<?php


require('models/messagerieModels.php');

$messagesdest = getAllMessagesReception();
$messagesexp = getAllMessagesEnvoie();

if (isset($_POST['subeleves'])) {
	$id_dest = $_POST['id_dest'];
	$contenu = $_POST['contenu'];
	if ($contenu != "") {
		$insertion = insertMessage($id_dest, $contenu);
		header('Location: messagerie');
	} else {
		Alerts::setFlash("Le message ne peut pas être vide !", "warning");
	}
}

if (isset($_POST['supmessage'])) {
	$id_exp = $_POST['idmessage'];
	$delete = deleteMessageWHERE($id_exp);
	header('Location: messagerie');
}

if (isset($_POST['delete'])) {
	$delete_all = deleteAllMessages();
	header('Location: messagerie');
}

require('views/messagerieView.php');

?>