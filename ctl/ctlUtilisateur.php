<?php
include './model/DbUtilisateur.php';

$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        // Récupération des infos users
        //$result = DbUtilisateur::list_ticket();
        include './vue/UI/Utilisateur/Accueil.php';
        break;

        case "searchUtilisateur":
            {

                $search = $_POST['search'];
                $search = '%' . $search . '%';

                $listeUtilisateur = DbUtilisateur::searchUtilisateur($search);
                
                include 'vue/UI/Organisateur/listeUser.php';

                break;

            }

}

?>
