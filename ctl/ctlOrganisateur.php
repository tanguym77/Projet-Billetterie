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

    // Formulaire ajout de billet -- On choisit un evenement
    case 'newTicket':
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/formAjoutBillet.php';
        break;
    
    // Création de billet -- Formulaire : 
    case 'ajout_billet_suite':
        $result = DbOrganisateur::info_zone($_POST['id_evenement']);
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/formAjoutBilletZone.php';
        break;

    // Création de billet -- Création
    case 'ajout_billet':
        DbOrganisateur::ajout_billet($_POST['nb_billets'], $_POST['prix'], $_POST['id_evenement'], $_POST['id_zone']);
        $result = DbOrganisateur::list_billets();
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/Accueil.php';
        break;

        
//  ========== MENU STADE =============== //

    // Affichage des stades
    case 'listStades':
        $result = DbOrganisateur::list_stades();
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/ListeStades.php';
        break;

    // Ajout stade
    case 'AjouterStade':
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/FormNewStade.php';
        break;
    
    
//  ========== FIN MENU STADE =============== //


    case 'vuelisteUser':
        $id = isset($_GET['id']) ? $_GET['id'] : null; // Vérifie si l'ID est présent dans la requête GET
        DbOrganisateur::infoUser($id);
        include './vue/UI/Organisateur/listeUser.php';
        break;
            

        case "editUser":
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
            
            
                include './vue/UI/Utilisateur/vueEdituser.php';
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
            
                            include './vue/UI/Organisateur/listeUser.php';
            
                            }
                            break;
            
                        }

                        case "infoUser":
                            {
                
                                $id = $_GET['id'];
                
                                $infoUtilisateur = DbOrganisateur::infoUser($id);
                                include './vue/UI/Organisateur/infoUser.php';
                
                                break;
                
                            }

                    
                            
                

}



?>
