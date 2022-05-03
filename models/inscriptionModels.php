<?php

function inscription($nom, $prenom, $pseudo, $email, $motdepasse, $numero) {
	global $bdd;
	$insertion = $bdd->prepare("
        INSERT INTO utilisateurs (nom, prenom, pseudo, email, motdepasse, date_inscription, heure_inscription, numero_confirmation, confirme, lvl) 
        VALUES (:nom, :prenom, :pseudo, :email, :motdepasse, CURDATE(), CURTIME(), :numero_confirmation, '0', '1')");
    $insertion->bindValue(':nom', $nom, PDO::PARAM_STR);
    $insertion->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $insertion->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $insertion->bindValue(':email', $email, PDO::PARAM_STR);
    $insertion->bindValue(':motdepasse', $motdepasse, PDO::PARAM_STR);
    $insertion->bindValue(':numero_confirmation', $numero, PDO::PARAM_INT);
    return $insertion->execute();
}

 ?>