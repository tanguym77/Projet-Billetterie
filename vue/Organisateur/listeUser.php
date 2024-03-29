<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .table-responsive {
            max-width: 100%;
            overflow-x: auto;
        }

        .table {
            width: 100%;
        }

        th,
        td {
            white-space: nowrap;
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            margin: 0;
        }

        .btn-retour {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <h1><i class="fas fa-exclamation-circle"></i> Liste utilisateurs</h1>
    </div>

    <!-- Bouton de retour -->
    <center>
    <div class="btn-retour">
        <a class="btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour</a>
    </div>
    </center>

    <br>

    <!-- Affichage des messages -->
    <?php
    if (isset($_GET['message'])) {
        if ($_GET['message'] == 'success') { ?>
            <div class="alert alert-success fade show alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Succès</strong> L'utilisateur a bien été ajouté
            </div>
        <?php } else if ($_GET['message'] == 'delete') { ?>
            <div class="alert alert-danger fade show alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Attention !</strong> L'utilisateur a bien été supprimé
            </div>
        <?php } else if ($_GET['message'] == 'update') { ?>
            <div class="alert alert-success fade show alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Succès</strong> L'utilisateur a bien été modifié
            </div>
        <?php }
    }
    ?>


    <br>
    <!-- Tableau des utilisateurs -->
    <div class="card card-alert text-center bg-card-liste">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable">
                    <thead class="table-dark">
                        <tr>
                            <th style="max-width: 100px;">Nom</th>
                            <th style="max-width: 100px;">Prénom</th>
                            <th style="max-width: 100px;">Statut</th>
                            <th style="max-width: 150px;">Identifiant</th>
                            <th style="max-width: 150px;">Email</th>
                            <th style="max-width: 150px;">Modifier</th>
                            <th style="max-width: 50px;">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once './model/DbOrganisateur.php';

                        // Appeler la méthode listeUserU pour récupérer les utilisateurs ayant un statut égal à 0.
                        $listeUserU = DbOrganisateur::listeUserU();

                        // Appeler la méthode listeUserA pour récupérer les utilisateurs ayant un statut égal à 1.
                        $listeUserA = DbOrganisateur::listeUserA();

                        // Fusionner les deux listes d'utilisateurs
                        $listeUtilisateurs = array_merge($listeUserU, $listeUserA);

                        // Parcourir la liste fusionnée des utilisateurs
                        foreach ($listeUtilisateurs as $user) {
                        ?>
                            <tr class="table-primary">
                                <td style="max-width: 100px;"><a href="index.php?ctl=Organisateur&action=infoUser2&id=<?php echo $user['id_utilisateur']; ?>"><?php echo $user['nom'] ?></a></td>
                                <td style="max-width: 100px;"><?php echo $user['prenom'] ?></td>
                                <?php
                                if ($user['status'] == 1) {
                                ?>
                                    <td style="max-width: 100px;">Administrateur</td>
                                <?php
                                } else {
                                ?>
                                    <td style="max-width: 100px;">Utilisateur</td>
                                <?php
                                }
                                ?>
                                <td style="max-width: 150px;"><?php echo $user['mail'] ?></td>
                                <td style="max-width: 150px;"><?php echo $user['mail'] ?></td>
                                <td style="max-width: 50px;"><a href="index.php?ctl=Organisateur&action=FormModifierUtilisateur&id_utilisateur=<?php echo $user['id_utilisateur']; ?>"><i class="fa fa-edit"></i></a></td>
                                <td style="max-width: 50px;"><a href="index.php?ctl=Organisateur&action=deleteUser&id=<?php echo $user['id_utilisateur'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?')"><i class="fa fa-trash-alt fa-red"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
