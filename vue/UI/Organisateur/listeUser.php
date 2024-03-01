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
                <a class="btn btn-sm btn-primary rounded me-2" href="index.php?controleur=Utilisateur&action=vueFormUtilisateur"><i class="fa fa-plus-circle"></i> Ajouter un utilisateur</a>
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
                if (isset($listeUserU)){
                    foreach ($listeUserU as $userU) {
                ?>
                        <tr class="table-primary">
                            <td><a href="index.php?controleur=Utilisateur&action=infoUser&id=<?php echo $userU['id_utilisateur']; ?>"><?php echo $userU['nom'].' '.$userU['prenom'] ?></a></td>
                            <?php
                            if($userU['status'] == 1){
                            ?>
                                <td>Administrateur</td>
                            <?php
                            } else {
                            ?>
                                <td>Utilisateur</td>
                            <?php
                            }
                            ?>
                            <td><?php echo $userU['id_utilisateur'] ?></td>
                            <td>
                                <?php 
                                if(strlen($userU['mail']) > 0){
                                    echo $userU['mail'];
                                } else {
                                    echo "<i class='fas fa-times-circle'></i>";
                                }
                                ?>
                            </td>
                            <?php
                            if($userU['status'] == 0){
                            ?>
                                <td>Utilisateur</td>
                            <?php
                            } else {
                            ?>
                                <td>Administrateur</td>
                            <?php
                            }
                            ?>
                            <td><a href="index.php?controleur=Utilisateur&action=editUtilisateur&id=<?php echo $userU['id_utilisateur'] ?>&s=<?php echo $userU['status'] ?>"><i class="fa fa-edit"></i></a></td>
                            <td><a href="index.php?controleur=Utilisateur&action=deleteUtilisateur&id=<?php echo $userU['id_utilisateur'] ?>"><i class="fa fa-trash-alt fa-red"></i></a></td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>
