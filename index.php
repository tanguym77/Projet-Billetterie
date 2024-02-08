<?php
session_start();

if(isset($_GET['ctl']))
{
   
	switch($_GET['ctl']){

        // Controleur Connexion
		case 'Connexion':
			include 'ctl/ctlConnexion.php';
			break;
        
        case 'Organisateur':
            if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
                include 'ctl/ctlOrganisateur.php';
            }else{
                include './vue/UI/Utilisateur/Accueil.php';
            }
            break;

        case 'Utilisateur':
            include 'ctl/ctlUtilisateur.php';
            break;
	}
}
// Si pas d'action on redirige vers L'accueil
else{
    include './vue/UI/Utilisateur/Accueil.php';
}

?>