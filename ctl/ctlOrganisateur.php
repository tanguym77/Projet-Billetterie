<?php
include './model/DbOrganisateur.php';

$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        // Récupération des infos users
        //$result = DbOrganisateur::list_ticket();
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/Accueil.php';
        break;

    case 'newTicket':

        $result = DbOrganisateur::info_form_create();

        include './vue/UI/Organisateur/formAjoutBillet.php';
        break;


    case 'vuelisteUser':
        include './vue/UI/Organisateur/listeUser.php';
        break;
            


}



?>
