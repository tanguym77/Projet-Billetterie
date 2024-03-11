<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informations sur le profil</title>
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

        <center><h1 class="title-page-formalerte"><i class="fas fa-info-circle"></i> Informations sur le profil</h1></center>
        <br>

        <div class="card card-alert text-center bg-light">
            <div class="text-center"></div>
            <div class="card-body card-body-alert text-form-alerte">
                <br>
                <h3 class="text-center font-weight-bold">Informations</h3>
                <br>
                <div class="card bg-primary text-white"> <!-- Suppression de la classe "mb-3" pour réduire la taille -->
                    <div class="card-body">
                        <?php foreach ($infoUtilisateur as $info) { ?>
                            <p class="card-text"><strong><i class="fas fa-user"></i> Nom : </strong><?php echo $info['nom'] ?></p>
                            <p class="card-text"><strong><i class="fas fa-user"></i> Prénom : </strong><?php echo $info['prenom'] ?></p>
                            <p class="card-text"><strong><i class="fas fa-id-card-alt"></i> Identifiant : </strong><?php echo $info['mail'] ?></p>
                            <?php if(strlen($info['mail']) > 0){ ?>
                                <p class="card-text"><strong><i class="fas fa-at"></i> Email : </strong><?php echo $info['mail'] ?></p>
                            <?php } ?>
                            <p class="card-text"><strong><i class="fas fa-user-circle"></i> Statut : </strong><?php 
                                switch($info['status']){
                                    case "1":
                                        echo "Administrateur";
                                        break;
                                    case "0":
                                        echo "Utilisateur";
                                        break;
                                } ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
