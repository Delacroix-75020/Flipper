<br><br>
<main class="content">
    <div class="container-fluid p-0">
        <center><h1 class="h3 mb-3">Liste des evenements</h1></center>
        <br><br>
        <br><br>
        <br><br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Contenu</th>
                                        <th scope="col">Date de creation</th>
                                        <th scope="col">Date de l'evenement</th>
                                        <th scope="col">Createur</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($events as $event) { ?>
                                    <tr>
                                        <td>
                                           <?= $event['titre']; ?>
                                        </td>
                                         <td>
                                            <?= $event['contenu']; ?>
                                        </td>
                                        <td>
                                            <?= $event['dateCreationEvent']; ?>
                                        </td>
                                        <td>
                                            <?= $event['dateEvent']; ?>
                                        </td>
                                        <td>
                                            <?= $event['prenom']."  ".$event['nom'] ; ?>
                                        </td>
                                        <td>
                                            <form method="post">
                                            <input type="hidden" value="<?= $event['id'] ?>" name="idevent" id="idevent">
                                            <button class="btn btn-danger font-weight-bolder" name="supevent" type="submit">Supprimer</button>  
                                            </form>
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