<br><br>
<main class="content">
    <div class="container-fluid p-0">
        <center><h1 class="h3 mb-3">Liste des utilisateurs</h1></center>
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
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Date adhesion</th>
                                        <th scope="col">Adresse Mail</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user) { ?>
                                    <tr>
                                        <td>
                                           <img src="avatar/<?= $user['avatar']; ?>" class="rounded-circle img-fluid" width="50" height="50" />
                                        </td>
                                         <td>
                                            <?= $user['prenom']."  ".$user['nom'] ; ?>
                                        </td>
                                        <td>
                                            <?= $user['dateAdhesion']; ?>
                                        </td>
                                        <td>
                                            <?= $user['email']; ?>
                                        </td>
                                       <!--<td>
                                            <form method="post">
                                            <input type="hidden" value="<?= $user['id'] ?>" name="iduser" id="iduser">
                                            <button class="btn btn-danger font-weight-bolder" name="supuser" type="submit">Supprimer</button>  
                                            </form>
                                       </td>-->
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>