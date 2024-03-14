<?php
include './model/DbConnexion.php';
$action = $_GET['action'];

switch ($action) {

    // L'Utilisateur accès au formulaire de connexion
    case 'FormLogin':
        include('./vue/UI/Utilisateur/Header.php');
        include('./vue/FormLogin.php');
        break;

    // L'Utilisateur accès au formulaire d'inscription
    case 'FormRegister':
        include('./vue/UI/Utilisateur/Header.php');
        include('./vue/FormRegister.php');
        break;
        
    // L'Utilisateur accès au formulaire d'inscription
    case 'Profil':
        if($_SESSION['status']==0){
            include('./vue/UI/Utilisateur/Header.php');
        }else{
            include('./vue/UI/Organisateur/Header.php');
        }
       
        include('./vue/Profil.php');
        break;

    // L'Utilisateur se connecte
    case 'login':

        if(isset($_POST['email']) && isset($_POST['password'])){

            $result = DbConnection::connectUser($_POST['email'],$_POST['password']);
            

            if($result != null){
                // Récupération des informations de l'utilisateur
                $_SESSION['nom'] = $result['nom'];
                $_SESSION['prenom'] = $result['prenom'];
                $_SESSION['mail'] = $result['mail'];
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

    // L'Utilisateur s'inscrit (template)
    case 'Register':
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])){
            $result = DbConnection::verifEmail($_POST['email']);

            if($result == null){
                $result = DbConnection::newUser($_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['password']);
            }

            else {
                header("Location:index.php?ctl=Connexion&action=FormRegister&msg=Erreur : un compte est déjà crée avec cet Email");
            }
        }
        
        include('./vue/UI/Utilisateur/Header.php');
        include('./vue/FormLogin.php');
        break;
    
    // L'Utilisateur s'inscrit (template)
    case 'ChangeProfil':
        if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password'])){
            $mdp=DbConnection::userPassword($_SESSION['mail']);
            if($mdp=$_POST['password']){
                if($_SESSION['mail']==$_POST['email']){
                    $changeUser=DbConnection::changeProfil2($_POST['nom'],$_POST['prenom'],$mdp);
                }   
                
                else {
                    $changeUser=DbConnection::changeProfil($_POST['nom'],$_POST['prenom'],$_POST['email'],$mdp);
                }
            }

            else {
                header("Location:index.php?ctl=Connexion&action=Profil&msg=Erreur : mot de passe incorrecte");
                break;
            }
        }

            

        session_unset();
        include('./vue/UI/Utilisateur/Header.php');
        include('./vue/FormLogin.php');
        break;
            
        
    // L'utilisateur se déconnecte
    case 'Deconnexion':
        session_unset();
        header("Location: index.php");
        break;
}

?>
