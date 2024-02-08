<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matchs de football - Billets</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .card {
            background-image: url('vue/img/fondblanc.jpg');
            background-size: cover;
            max-width: 300px; /* Définir la largeur maximale des billets */
            margin: 0 auto; /* Centrer les billets */
        }
        .equipe-img {
            max-width: 50px;
            max-height: 50px;
            margin-right: 10px;
        }
        .equipe-container {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Matchs de football - Billets</h1>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Match 1 - Équipe A vs Équipe B</h4>
                        <p class="card-text">Équipes: 
                            <div class="equipe-container">
                                <img class="equipe-img" src="vue/img/lsyrie.png" alt="Équipe A">
                                <span>Équipe A</span>
                            </div>
                            <span>-</span>
                            <div class="equipe-container">
                                <img class="equipe-img" src="vue/img/chinel.png" alt="Équipe B">
                                <span>Équipe B</span>
                            </div>
                        </p>
                        <p class="card-text">Date: 01/03/2024</p>
                        <p class="card-text">Heure: 20:00</p>
                        <p class="card-text">Stade: Stade ...</p>
                        <button class="btn btn-primary">Modifier</button>
                        <button class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="card-title">Match 2 - Équipe C vs Équipe D</h4>
                        <p class="card-text">Équipes: 
                            <div class="equipe-container">
                                <img class="equipe-img" src="vue/img/qatar.jpg" alt="Équipe C">
                                <span>Équipe C</span>
                            </div>
                            <span>-</span>
                            <div class="equipe-container">
                                <img class="equipe-img" src="vue/img/jordan.png" alt="Équipe D">
                                <span>Équipe D</span>
                            </div>
                        </p>
                        <p class="card-text">Date: 03/03/2024</p>
                        <p class="card-text">Heure: 18:00</p>
                        <p class="card-text">Stade: Stade ...</p>
                        <button class="btn btn-primary">Modifier</button>
                        <button class="btn btn-danger">Supprimer</button>
                    </div>
                </div>
            </div>
            <!-- Ajouter d'autres matchs ici au besoin -->
        </div>
    </div>
    <!-- Bootstrap JS and jQuery (optional) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
