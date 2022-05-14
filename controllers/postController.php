<?php
    require "models/postModels.php";


if (isset($_POST['postEvent'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $contenu = htmlspecialchars($_POST['contenu']);
    $dateEvent = $_POST['date'];
    $url_video = $_POST['url_video'];
    $id_user = $_SESSION['id'];
    if ($titre != "" && $contenu != "") {

                $events = insertEvent($titre, $contenu, $url_video, $dateEvent, $id_user);
                Alerts::setFlash("Votre Evenement a bien été posté !");
            } else {
                Alerts::setFlash("Il faut remplir tous les champs");
            }
}
    $events = getAllEvent();
    $followeds = getFollowed();   
    $followers = getFollower();

if (isset($_POST['postInterest'])){
    $id_user = $_SESSION['id'];
    $id_event =  $_POST['id_event'];
    $requete = insertInterest($id_user, $id_event);
}



require "views/postView.php";
?>