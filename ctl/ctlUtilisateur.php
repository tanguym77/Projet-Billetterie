<?php
include './model/DbUtilisateur.php';
$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        include './vue/UI/Utilisateur/Header.php';
        include './vue/UI/Utilisateur/Accueil.php';
        include './vue/Footer.php';
        break;

//  ========== MENU VOIR LES MATCHS =============== //
    case 'ListMatch':
        // Récupération des infos de la list des matchs
        $result = DbUtilisateur::list_evenements();
        include './vue/UI/Utilisateur/Header.php';
        include './vue/UI/Utilisateur/ListMatch.php';
        include './vue/Footer.php';
        break;

    case 'DetailMatch':
        $result = DbUtilisateur::info_matchs($_GET['evenement']); // Info générales
        $billets_reserve = DbUtilisateur::billets_reserve($_GET['evenement']);
        $billets_dispo = DbUtilisateur::billets_dispo($_GET['evenement']);
        $info_zone = DbUtilisateur::info_zone($_GET['evenement']);
        $prix_zone = DbUtilisateur::prix_zone($_GET['evenement']);
        include './vue/UI/Utilisateur/Header.php';
        include './vue/UI/Utilisateur/DetailMatch.php';
        include './vue/Footer.php';
        break;

//  ========== FIN MENU VOIR LES MATCHS =============== //


//  ========== RESERVATIONS =============== //

    case 'Reserver':
        // L'utilisateur n'est pas connecté
        if ($_SESSION['nom']==null) {
            $_SESSION['evenement'] = $_POST['evenement'];
            header("Location: index.php?ctl=Connexion&action=FormLogin");
        }
        include './vue/UI/Utilisateur/Header.php';
        include './vue/UI/Utilisateur/FormReservation.php';
        include './vue/Footer.php';
        break;

    


//  ========== FIN RESERVATIONS =============== //

}

?>
