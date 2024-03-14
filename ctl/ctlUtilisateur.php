<?php
include './model/DbUtilisateur.php';
$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        include './vue/UI/Utilisateur/Accueil.php';
        break;

    case 'ListMatch':
        // Récupération des infos de la list des matchs
        $result = DbUtilisateur::list_evenements();
        include './vue/UI/Utilisateur/ListMatch.php';
        break;

    case 'DetailMatch':
        $result = DbUtilisateur::info_matchs($id_evenement);
        include './vue/UI/Utilisateur/DetailMatch.php';
        break;

}

?>
