<style>
    body {
    background: rgb(99, 39, 120)
}

.form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
}

.profile-button {
    background: rgb(99, 39, 120);
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #682773
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}
</style>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="avatar/<?= $_SESSION['avatar'] ?>"></br><span class="font-weight-bold"><?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?></span><span class="text-black-50"><?= $_SESSION['email'] ?></span><span class="font-weight-bold"><?= $_SESSION['dateAdhesion'] ?></span></div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Informations Generales</h4>
                </div>
               <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                        </th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Nom</td>
                                                        <td><?= $_SESSION['nom']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Prénom</td>
                                                        <td><?= $_SESSION['prenom']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adresse email</td>
                                                        <td><?= $_SESSION['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Téléphone</td>
                                                        <td><?= $_SESSION['tel']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adresse</td>
                                                        <td><?= $_SESSION['adresse']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Biographie</td>
                                                        <td><?= $_SESSION['bio']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <br>
                    
                                           
                <div class="mt-5 text-center">
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#editprofile">Editer Profile</button></div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                        <label for="mdp" class="form-label">Avatar</label>
                        <input type="file" name="avataruser" id="bio" class="form-control">
                        <button type="submit" name="editavatar" class="btn btn-primary">Changer Avatar</button>
                </div>
                </form> 
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editer utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Prenom de l'utilisateur</label>
                        <input type="text" value="<?= $_SESSION['prenom'] ?>" name="prenomuser" id="prenom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Nom de l'utilisateur</label>
                        <input type="text" value="<?= $_SESSION['nom'] ?>" name="nomuser" id="nom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email de l'utilisateur</label>
                        <input type="email" value="<?= $_SESSION['email'] ?>" name="emailuser" id="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="pseudo" class="form-label">Numéro de téléphone</label>
                        <input type="text" name="teluser" value="<?= $_SESSION['tel'] ?>" id="tel" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse de l'utilisateur</label>
                        <input type="text" name="adresseuser" value="<?= $_SESSION['adresse'] ?>" id="adresse" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="mdp" class="form-label">Biographie</label>
                        <input type="text" value="<?= $_SESSION['bio'] ?>" name="biouser" id="bio" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="editutilisateur" class="btn btn-primary">Modifier</button>
                </div>
            </form>
        </div>
    </div>

</div>