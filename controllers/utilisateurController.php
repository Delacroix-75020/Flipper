<?php
    require "models/utilisateurModels.php";

    $users = getAllUsers();
    $followeds = getFollowedUserIds($_SESSION['id']);


        if(isset($_POST['btnFollowUnfollow'])){
            if(isset($_POST['action'])){
                $id_followed = $_POST['id_followed'];
                $id_follower = $_SESSION['id'];
                $action = $_POST['action'];
                if($action == "Follow"){
                    $requete = insertFollow($id_followed, $id_follower);
                }
                else if($action =="Unfollow"){
                    $requete = deleteFollow($id_followed, $id_follower);
                }
            }
            header('Location: http://localhost/Flipper/utilisateur');
        }



    require "views/utilisateurView.php";
    
?>