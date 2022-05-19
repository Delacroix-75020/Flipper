<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
        crossorigin="anonymous">
        
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        
<br>
    <div class="container-fluid gedf-wrapper">
         <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="h5"><?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></div>
                        <div class="h7 text-muted"></div>
                        <div class="h7"><?= $_SESSION['bio'] ?>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="h6 text-muted">Personnes suivies</div>
                            <?php foreach($followeds as $followed){
                                ?>
                            <div class="h5"><?= $followed['nb_followed']; ?> personne(s) </div>
                        <?php } ?>
                        </li>
                        <li class="list-group-item">
                            <div class="h6 text-muted">Suivi par</div>
                            <?php foreach($followers as $follower){
                                ?>
                            <div class="h5"><?= $follower['nb_follower']; ?> personne(s) </div>
                        <?php } ?>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 gedf-main">

                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab" aria-controls="posts" aria-selected="true">Crée un évenement</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">
                                <div class="form-group">
                                    <input class="form-control" name="titre" id="message" rows="3" placeholder="Titre de l'evenement"></input>
                                </br>
                                    <label class="sr-only" for="message">post</label>
                                    <textarea class="form-control" name="contenu" id="message" rows="3" placeholder="Contenu de votre message"></textarea>
                                </br>
                                    <input type="date" class="form-control" name="date" id="date">
                                </br>
                                    <input type="url" placeholder="https://example.com" class="form-control" name=" url_video" id="url_video">
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="btn-toolbar justify-content-between">
                            <div class="btn-group">
                                <button type="submit" name="postEvent" class="btn btn-primary">Envoyer</button>
                            </div>
                            <div class="btn-group">
                            </div>

                        </form>
                        
                        </div>
                    </div>
                </div>
                <br>
                <!-- Post /////-->
                <?php foreach($events as $event){ ?>
                <!--- \\\\\\\Post-->
                <div class="card gedf-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="mr-2">
                                    <img class="rounded-circle" width="45" src="avatar/<?= $event['avatar']; ?>"> 
                                </div>
                                <div class="ml-2">
                                    <div class="h5 m-0"><?= $event['prenom']; ?> <?= $event['nom']; ?></div>
                                    <div class="h7 text-muted"><?= $event['dateCreationEvent']; ?></div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="text-muted h7 mb-2"> <i class="fa fa-clock-o"></i><?= $event['dateEvent']; ?></div>
                        <a class="card-link" href="#">
                            <h5 class="card-title"><?= $event['titre']; ?></h5>
                        </a>

                        <p class="card-text">
                            <?= $event['contenu']; ?>
                        </p>
                    <a href="<?=$event['url_video'];?>">Vidéo</a>
                    </div>
                    <div class="card-footer">
                        <div class="btn-group">
                            <form method="post">
                                <input type="hidden" name="id_event" id ="id_vent" value="<?= $event['id']; ?>">
                                <?php if( !isInterested($_SESSION['id'], $event['id']) ){

                                 ?>
                                <button type="submit" name="postInterest" class="btn btn-primary"> ça m'intéresse ? </button>
                            <?php }else{

                             ?>
                            <button type="submit" name="postUninterest" class="btn btn-primary"> ça m'intéresse plus </button>
                        <?php } ?>
                            </form>
                            <?php 
                                $content = "";
                                $tabUsers = getAllEventsUsers($event['id']);
                                foreach($tabUsers as $tabUser){
                                 $content = $content. $tabUser['prenom']. " ". $tabUser['nom']. "<br>";  
                                 
                                }
                            ?> 
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postmodal<?= $event['id']; ?>">Small modal</button>
                            <?php if($event['id_user'] == $_SESSION['id']){  ?>
                            <form method="post">
                                <input type="hidden" name="id_event" id ="id_vent" value="<?= $event['id']; ?>">
                               <button type="submit" name="deleteEvent" onclick="return(confirm('Voulez-vous vraiment supprimer cette evenement ?'));" class="btn btn-primary"> Supprimer</button> 
                            </form>      
                        <?php } ?>
                            <div class="modal fade bd-example-modal-sm" id="postmodal<?= $event['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <?php echo $content; ?>
                                </div>
                              </div>
                            </div>
                            </div>
                    </div>
                </div>
            <?php } ?>
    </div>
       




