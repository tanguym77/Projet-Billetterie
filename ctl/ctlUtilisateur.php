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
        $result = DbUtilisateur::list_billets();
        include './vue/UI/Utilisateur/ListMatch.php';
        break;


        case "editUtilisateur":
            {
                $id = $_GET['id'];
                $status = $_GET['s'];
                if ($status == 0)
                {
                    $infoI = DbOrganisateur::infoUserU($id);
                }
                else
                {
                    $infoUserU = DbOrganisateur::infoUserA($id);
                }
            
            
                include './vue/UI/Utilisateur/vuetestEditUtilisateur.php';
                break;
            }
            

            case "vueUtilisateur":
                {
    
                    $listeUserU = DbOrganisateur::listeUserU();
                    //$listeUserA = DbOrganisateur::listeUserA();
    
                    include './vue/UI/Utilisateur/listeUser.php';
    
                    break;
    
                }

}

?>
