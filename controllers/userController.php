<?php

require "models/utilisateurModels.php";

 $users = getAllUsers();

if (isset($_POST['supuser'])) {
	$id = $_POST['iduser'];
	$delete = deleteUserWhere($id);
	header('Location: user');
}

require "views/userView.php";
?>