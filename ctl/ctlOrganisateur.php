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

                            case "modifUtilisateur": {
                                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                    // Récupérer les données du formulaire
                                    $id = $_POST['id_utilisateur'];
                                    $nom = $_POST['nom'];
                                    $prenom = $_POST['prenom'];
                                    $email = $_POST['email'];
                                    $statut = $_POST['statut'];
                                    $password = $_POST['password']; // Mot de passe non haché
                            
                                    // Appeler la méthode pour modifier l'utilisateur dans le modèle
                                    $editUser = ModelUtilisateur::editUser($nom, $prenom, $email, $statut, $id);
                            
                                    // Modifier l'email si nécessaire
                                    if (strlen($email) > 0) {
                                        $editUserEmail = ModelUtilisateur::editUserEmail($email, $id);
                                    }
                            
                                    // Modifier le mot de passe si un nouveau mot de passe est fourni
                                    if (strlen($password) > 0) {
                                        $editUserPassword = ModelUtilisateur::editUserPassword($password, $id);
                                    }
                            
                                    // Rediriger vers une autre page après la modification
                                    header("Location: index.php?controleur=utilisateur&action=vuelisteUser&message=update");
                                    exit();
                                } else {
                                    // Si la requête n'est pas de type POST, rediriger vers une autre page ou afficher une erreur
                                    // selon le cas
                                    // Vous pouvez également gérer cela dans la vue pour afficher un message d'erreur approprié
                                    header("Location: index.php?controleur=utilisateur&action=vuelisteUser&message=error");
                                    exit();
                                }
                                break;
                            }
                            
                

}



?>
