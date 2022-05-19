<br><br>
<main class="content">
    <div class="container-fluid p-0">
        <center><h1 class="h3 mb-3">Bienvenue sur votre messagerie</h1></center>
        <br><br>
        <div class="d-flex justify-content-center mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#send-msg">
                Envoyer un message
            </button>
        </div>
        <br><br>
        <br><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <center><h1 class="h3 mb-3">Message(s) receptioné(s)</h1></center>
                                <br><br>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Contenu</th>
                                         <th scope="col">Expéditeur</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($messagesdest as $messagedest) { ?>
                                    <tr>
                                        <td>
                                            <?= $messagedest['date_envoi']; ?>
                                        </td>
                                        <td>
                                            <?= $messagedest['contenu']; ?>
                                        </td>
                                        <td>
                                            <?= $messagedest['nomE']."  ".$messagedest['prenomE'] ; ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <center><h1 class="h3 mb-3">Message(s) envoyé(s)</h1></center>
                                <br><br>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                        <th scope="col">Date</th>
                                        <th scope="col">Contenu</th>
                                         <th scope="col">Destinataire</th>
                                        <td scope="col"></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($messagesexp as $messageexp) { ?>
                                    <tr>
                                        <td>
                                            <?= $messageexp['date_envoi']; ?>
                                        </td>
                                        <td>
                                            <?= $messageexp['contenu']; ?>
                                        </td>
                                          <td>
                                            <?= $messageexp['nomR']."  ".$messageexp['prenomR'] ; ?>
                                        </td>
                                        <td>
                                            <form method="post">
                                            <input type="hidden" value="<?= $messageexp['id'] ?>" name="idmessage" id="idmessage">
                                            <button class="btn btn-danger font-weight-bolder" name="supmessage" type="submit">Supprimer</button>  
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                           <br> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
        </div>
    </div>
</main>

<div class="modal fade" id="send-msg" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Envoyer un message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php if (isset($_SESSION['id'])) { ?>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="destinataire" class="form-label">Autres utilisateurs</label>
                        <select name="id_dest" id="destinatairee" class="form-select">
                            <?php 
                            $requete = $bdd->query("SELECT * FROM utilisateur");
                            $lesUsers = $requete->fetchAll();
                            foreach ($lesUsers as $unUser) { 
                                if($unUser['id'] != $_SESSION['id']){ 
                                ?>
                            <option value="<?= $unUser['id']; ?>">M. <?= $unUser['nom']; ?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editor" class="form-label">Message</label>
                        <textarea name="contenu" id="editor" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" name="subeleves" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>