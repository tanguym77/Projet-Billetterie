<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- BOOTSTRAP V5.3.3 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
        <!-- STYLE CUSTOM -->
        <link rel="stylesheet" href="./vue/styles.css">

        <!-- ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- SCRIPTS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
        
        <style>
            .navbar-brand img {
                height: 50px; /* Ajustez la hauteur de l'image selon vos besoins */
            }
        </style>

    <title>Billetterie</title>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Billetterie Asian Cup
            <img src="vue/image/ballon-de-football.png"  alt="Logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Accueil -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <!-- Voir les Matchs -->
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php?ctl=Utilisateur&action=ListMatch">Voir les matchs</a>
                    </li>
                    <!-- Voir MES BILLETS -->
                    <li class="nav-item">
                        <?php if (isset($_SESSION['prenom'])) {echo('<a class="nav-link active" href="index.php?ctl=Utilisateur&action=MesBillets" >Mes Billets</a>');} ?>
                    </li>
                </ul>
                <!-- CONNEXION DECONNEXION -->
                <span class="navbar-text">
                    <a class="navbar-brand" href="https://www.youtube.com/watch?v=04854XqcfCY" target="_blank"><img src="vue/image/trophee.png"  alt="Logo"></a>
                    <?php if (!isset($_SESSION['prenom'])) {echo('<a class="btn btn-info" href="index.php?ctl=Connexion&action=FormLogin">LOGIN</a>');} ?>
                    <?php if (isset($_SESSION['prenom'])) {echo('<a class="btn btn-info" href="index.php?ctl=Connexion&action=Profil">Voir profil</a>');} ?>
                    <?php if (isset($_SESSION['prenom'])) {echo('<a class="btn btn-info" href="index.php?ctl=Connexion&action=Deconnexion">Deconnexion</a>');} ?>
                </span>
            </div>
        </div>
    </nav>