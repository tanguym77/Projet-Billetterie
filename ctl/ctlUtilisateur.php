<?php
include './model/DbUtilisateur.php';
include './model/DbOrganisateur.php';
$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        // Récupération des infos users
        //$result = DbUtilisateur::list_ticket();
        include './vue/UI/Utilisateur/Accueil.php';
        break;

    case 'ListMatch':
        // Récupération des infos de la list des matchs
        //$result = DbUtilisateur::list_ticket();
        include './vue/UI/Utilisateur/ListMatch.php';
        break;


        

}

?>
