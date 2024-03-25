<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Utilisateur</title>
</head>
<body>

    <h2 class="text-center py-3">Modifier un Utilisateur</h2>
    <div class="row m-0 justify-content-center p-5">

        <div class="col-md-6 border rounded p-5">
            <form action="index.php?ctl=Organisateur&action=ModifierUtilisateur" method="POST">
                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="nom">Nom </label>
                    <input class="col-6" id="nom" name="nom" type="text" placeholder="Saisir un nom" value="<?php echo $user['nom']; ?>">
                </div>

                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="prenom">Prénom </label>
                    <input class="col-6" id="prenom" name="prenom" type="text" placeholder="Saisir un prénom" value="<?php echo $user['prenom']; ?>">
                </div>

                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="mail">Adresse Mail</label>
                    <input class="col-6" id="mail" name="mail" type="text" placeholder="Saisir un mail" value="<?php echo $user['mail']; ?>">
                </div>

                <div class="text-center row m-0 py-3">
                    <label class="col-6" for="password">Mot de passe </label>
                    <div class="col-6">
                        <input id="password" name="password" type="password" placeholder="Saisir un mot de passe" value="<?php echo $user['password']; ?>">
                        <input id="showPassword" type="checkbox"> Afficher le mot de passe
                    </div>
                </div>

                <div class="text-center row m-0 py-3">
                    <label class="col-6">Statut </label>
                    <div class="col-6">
                        <input id="admin" name="status" type="radio" value="1" <?php echo $user['status'] == "1" ? "checked" : ""; ?>>
                        <label for="admin">Administrateur</label>
                        <input id="user" name="status" type="radio" value="0" <?php echo $user['status'] == "0" ? "checked" : ""; ?>>
                        <label for="user">Utilisateur</label>
                    </div>
                </div>

                <input type="hidden" name="id_utilisateur" value="<?php echo $_GET['id_utilisateur']; ?>">

                <div class="text-center row m-0 py-3">
                    <input class="col-12" type="submit">
                </div>
                
            </form>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPassword');

        function togglePasswordVisibility() {
            if (showPasswordCheckbox.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }

        showPasswordCheckbox.addEventListener('change', togglePasswordVisibility);

        togglePasswordVisibility();
    </script>
</body>
</html>
