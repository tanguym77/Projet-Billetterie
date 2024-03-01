<?php
include './model/DbOrganisateur.php';

$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        // Récupération des billets
        $result = DbOrganisateur::list_billets();
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/Accueil.php';
        break;

    case 'newTicket':
        include './vue/UI/Organisateur/formAjoutBillet.php';
        break;
    
    case 'ajout_billet':
        DbOrganisateur::ajout_billet($_POST['match_id'], $_POST['prix'], $_POST['nb_billets']);
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/Accueil.php';
        break;

    case 'vuelisteUser':
        DbOrganisateur::infoUser();
        include './vue/UI/Organisateur/listeUser.php';
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


                case "deleteUser":
                    {
        
                            $id = $_GET['id'];
        
                            $deleteUser = DbOrganisateur::deleteUser($id);
        
        ?>
                <script>document.location="index.php?ctl=Organisateur&action=vuelisteUser&message=delete"</script>
                <?php
                        break;
        
                    }

                    case "vuelisteUser":
                        {
                            if ($_SESSION['status'] == 'Administrateur') {
                            $listeUserU = DbOrganisateur::listeUtilisateurU();
                            $listeUserA = DbOrganisateur::listeUtilisateurA();
            
                            include './vue/UI/Utilisateur/listeUser.php';
            
                            }
                            break;
            
                        }

}



?>
