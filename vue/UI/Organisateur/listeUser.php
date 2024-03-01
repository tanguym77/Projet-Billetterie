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
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <!-- Bouton de retour -->
    <div class="btn-retour mt-2">
        <a class="btn btn-secondary" href="javascript:history.go(-1)"><i class="fas fa-arrow-circle-left"></i> Retour</a>
    </div>

    <br><br>

    <center>
        <h1 class="title-page-allalerte"><i class="fas fa-exclamation-circle"></i> Utilisateurs</h1>
    </center>
    <br><br>

    <center>
        <div class="mb-3 p-1">
            <div class="btn-group me-2 btnAjout">
                <a class="btn btn-sm btn-primary rounded me-2" href="index.php?ctl=Utilisateur&action=vueFormUtilisateur"><i class="fa fa-plus-circle"></i> Ajouter un utilisateur</a>
            </div>
        </div>
    </center>


    <br>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead class="table-dark">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Statut</th>
                        <th>Identifiant</th>
                        <th>Email</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
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
                            <td><a href="index.php?ctl=Utilisateur&action=infoUser&id=<?php echo $user['id_utilisateur']; ?>"><?php echo $user['nom'] ?></a></td>
                            <td><?php echo $user['prenom'] ?></td>
                            <?php
                            if($user['status'] == 1){
                            ?>
                                <td>Administrateur</td>
                            <?php
                            } else {
                            ?>
                                <td>Utilisateur</td>
                            <?php
                            }
                            ?>
                            <td><?php echo $user['mail'] ?></td>
                            <td><?php echo $user['mail'] ?></td>
                            <td><a href="index.php?ctl=Organisateur&action=editUser&id=<?php echo $user['id_utilisateur'] ?>&s=<?php echo $user['status'] ?>"><i class="fa fa-edit"></i></a></td>
                            <td><a href="index.php?ctl=Utilisateur&action=deleteUser&id=<?php echo $user['id_utilisateur'] ?>"><i class="fa fa-trash-alt fa-red"></i></a></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
