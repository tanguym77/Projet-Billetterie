<body>

    <h2 class="text-center py-3">Modifier un Utilisateur</h2>
    <div class="row m-0 justify-content-center p-5">

        <div class="col-md-6 border rounded p-5">
            <form action="index.php?ctl=Organisateur&action=ModifierUtilisateur" method="POST">
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="nom">Nom </label>
                    <input class="col-6" id="nom" name="nom" type="text" placeholder="Saisir un nom" value="<?php echo($result['nom']) ?>">
                </div>

                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="prenom">Prénom </label>
                    <input class="col-6" id="prenom" name="prenom" type="text" placeholder="Saisir un prénom" value="<?php echo($result['prenom']) ?>">
                </div>

                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="mail">Adresse Mail</label>
                    <input class="col-6" id="mail" name="mail" type="number" placeholder="Saisir un mail" value="<?php echo($result['mail']) ?>">
                </div>


                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="password">Mot de passe </label>
                    <input class="col-6" id="password" name="password" type="text" placeholder="Saisir un mot de passe" value="<?php echo($result['password']) ?>">
                </div>


                <input type="hidden" name="id_utilisateur" value="<?php echo($_GET['id_utilisateur'])?>">
                

                <div class="text-center row m-0 py-3">
                    <input class="col-12" id="capacite" type="submit">
                </div>
                
            </form>
        </div>
    </div>
</body>