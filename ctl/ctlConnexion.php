<?php
include './model/DbConnexion.php';

$action = $_GET['action'];

switch ($action) {

    // L'Utilisateur accès au formulaire de connexion
    case 'FormLogin':
        include('./vue/UI/Utilisateur/Header.php');
        include('./vue/FormLogin.php');
        break;


    // L'Utilisateur se connecte
    case 'login':

        if(isset($_POST['email']) && isset($_POST['password'])){

            $result = DbConnection::connectUser($_POST['email'],$_POST['password']);
            

            if($result != null){
                // Récupération des informations de l'utilisateur
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION['status'] = $result['status'];

                // L'utilisateur est un admin
                if($_SESSION['status'] == 1){
                    header("Location: index.php?ctl=Organisateur&action=Accueil");
                }
                // L'utilisateur n'est pas admin
                else{ 
                    header("Location: index.php?ctl=Utilisateur&action=Accueil");
                }
                
            }
            if($result == null){
                header("Location:index.php?ctl=Connexion&action=FormLogin&msg=Email ou mot de passe incorrect");
            }
        }
        break;

    // L'utilisateur se déconnecte
    case 'Deconnexion':
        session_unset();
        header("Location: index.php");
        break;
}

?>
