<?php

require "models/postModels.php";

$events = getAllEvent();

if (isset($_POST['supevent'])){
    $idevent =  $_POST['idevent'];
    $requete = deleteEvent($idevent);
    header('Location: allpost');
}

require "views/allpostView.php";
?>