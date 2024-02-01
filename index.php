<?php
session_start();

if(isset($_GET['ctl']))
{
   
	switch($_GET['ctl']){

        // Controleur Connexion
		case 'Connexion':
			include 'ctl/ctlConnexion.php';
			break;
        
        case 'Gestionnaire':
            if(isset($_SESSION['status']) && $_SESSION['status'] == 1){
                include 'ctl/ctlGestionnaire.php';
            }else{
                include './vue/User/Accueil.php';
            }
            break;
	}
}
// Si pas d'action on redirige vers L'accueil
else{
    include './vue/Accueil.php';
}

?>