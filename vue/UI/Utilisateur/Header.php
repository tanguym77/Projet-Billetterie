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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
        <style>
        .navbar-brand img {
            height: 50px; /* Ajustez la hauteur de l'image selon vos besoins */
        }
        </style>
    <title>Billetterie</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">GOAL !!!
            <img src="vue/image/ballon-de-football.png"  alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- LIEN 1 -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                </li>
                <!-- LIEN 2 -->
                <li class="nav-item">
                    <a class="nav-link active" href="index.php?ctl=Utilisateur&action=ListMatch">Reservation</a>
                </li>
                <!-- LIEN 3 -->
                <li class="nav-item">
                    <a class="nav-link active" href="#">Lien 3</a>
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