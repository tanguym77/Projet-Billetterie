<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- STYLES -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    
    <title>Billetterie</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Page Organisateur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- LIEN 1 -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Créer Billet</a>
                </li>
                <!-- LIEN 2 -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Utilisateurs</a>
                </li>
                <!-- LIEN 3 -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Paramètres</a>
                </li>
            </ul>
            <!-- CONNEXION DECONNEXION -->
            <span class="navbar-text">
                <?php if (!isset($_SESSION['prenom'])) {echo('<a class="btn btn-info" href="index.php?ctl=Connexion&action=FormLogin">LOGIN</a>');} ?>
                <?php if (isset($_SESSION['prenom'])) {echo("Bonjour ".$_SESSION['prenom']);} ?>
                <?php if (isset($_SESSION['prenom'])) {echo('<a class="btn btn-info p-2" href="index.php?ctl=Connexion&action=Deconnexion">Deconnexion</a>');} ?>
            </span>
            </div>
        </div>
    </nav>
    
