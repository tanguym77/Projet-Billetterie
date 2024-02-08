<?php
include './model/DbUtilisateur.php';

$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        // Récupération des infos users
        //$result = DbUtilisateur::list_ticket();
        include './vue/UI/Utilisateur/Header.php';
        include './vue/UI/Utilisateur/Accueil.php';
        break;

}

?>
