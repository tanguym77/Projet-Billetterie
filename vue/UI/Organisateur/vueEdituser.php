<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification des informations sur le profil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px; /* Largeur maximale de la carte */
            margin: 0 auto; /* Centre la carte horizontalement */
        }

        .card-body {
            padding: 40px; /* Taille de la marge intérieure */
        }

        .card-text {
            margin-bottom: 5px; /* Espacement entre chaque élément de texte */
        }

        .btn-retour {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="btn-retour mt-2">
            <button class="btn btn-secondary" onclick="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour</button>
        </div>

        <center><h1 class="title-page-formalerte"><i class="fas fa-info-circle"></i> Modification des informations sur le profil</h1></center>
        <br>

        <div class="card card-alert text-center bg-light">
            <div class="text-center"></div>
            <div class="card-body card-body-alert text-form-alerte">
                <form method="post" action="index.php?controleur=utilisateur&action=modifUtilisateur">
                    <br>
                    <h3 class="text-center font-weight-bold">Informations</h3>
                    <br>
                    <div class="card bg-primary text-white"> <!-- Suppression de la classe "mb-3" pour réduire la taille -->
                        <div class="card-body">
                            <?php if (!empty($infoUtilisateur)) { ?>
                                <input type="hidden" name="id_utilisateur" value="<?php echo $infoUtilisateur['id_utilisateur']; ?>">
                                <div class="mb-3">
                                    <label for="nom" class="form-label">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $infoUtilisateur['nom']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="prenom" class="form-label">Prénom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $infoUtilisateur['prenom']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $infoUtilisateur['mail']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Statut</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="1" <?php if ($infoUtilisateur['status'] == '1') echo 'selected'; ?>>Administrateur</option>
                                        <option value="0" <?php if ($infoUtilisateur['status'] == '0') echo 'selected'; ?>>Utilisateur</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mot de passe</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                                </div>
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            <?php } else { ?>
                                <p>Aucune information d'utilisateur disponible.</p>
                            <?php } ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
