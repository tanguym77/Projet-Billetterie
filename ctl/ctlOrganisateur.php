<?php
include './model/DbOrganisateur.php';

$action = $_GET['action'];

switch ($action) {

 //  ========== ACCUEIL =============== //
    case 'Accueil':
        // Récupération des billets
        $result = DbOrganisateur::list_billets();
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/Accueil.php';
        break;
//  ========== FIN ACCUEIL =============== //


//  ========== MENU BILLETS =============== //

    // Formulaire ajout de billet -- selection evenement
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

    // Création de billet -- Création dans db
    case 'ajout_billet':
        DbOrganisateur::ajout_billet($_POST['nb_billets'], $_POST['prix'], $_POST['id_evenement'], $_POST['id_zone']);
        header("Location: index.php?ctl=Organisateur&action=ListeStades");
        break;

//  ========== FIN MENU BILLETS =============== //


//  ========== MENU EQUIPES =============== //

    // Affichage des équipes
    case 'ListeEquipes':
        $result = DbOrganisateur::ListeEquipes();
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/ListeEquipes.php';
        break;

    // Form ajout équipe
    case 'FormAjoutEquipe':
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/FormAjoutEquipe.php';
        break;

    // Creation d'une équipe'
    case 'AjouterEquipe':
        if($_FILES['photo_equipe']['name']!=''){$photo_equipe = $_POST['nom_equipe'].".".(pathinfo($_FILES['photo_equipe']['name']))['extension'];}else{$photo_equipe='';}
        DbOrganisateur::AjouterEquipe($_POST['nom_equipe'], $photo_equipe);
        header("Location: index.php?ctl=Organisateur&action=ListeEquipes");
        break;

    // Form Modifier Equipe
    case 'FormModifierEquipe':
        $result = DbOrganisateur::GetInfoEquipe($_GET['id_equipe']);
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/FormModifierEquipe.php';
        break;

    // Modifier une equipe
    case 'ModifierEquipe':

        if($_FILES['photo_equipe']['name']!=''){$photo_equipe = $_POST['nom_equipe'].".".(pathinfo($_FILES['photo_equipe']['name']))['extension'];}else{
            if(DbOrganisateur::Existe_Photo_Equipe($_POST['id_equipe'])['photo_equipe']!=null){$photo_equipe=DbOrganisateur::Existe_Photo_Equipe($_POST['id_equipe'])['photo_equipe'];}else{$photo_equipe='';}
        }
        // SI extension différente on enlève l'ancienne photo
        if (DbOrganisateur::Existe_Photo_Equipe($_POST['id_equipe'])['photo_equipe'] != $photo_equipe && $_FILES['photo_equipe']['name']!='') {
            unlink("./uploads/equipes/".DbOrganisateur::Existe_Photo_Equipe($_POST['id_equipe'])['photo_equipe']);
        }

        DbOrganisateur::ModifierEquipe($_POST['id_equipe'], $_POST['nom_equipe'], $photo_equipe);
        
        header("Location: index.php?ctl=Organisateur&action=ListeEquipes");

        break;
    
    // Supprimer une equipe
    case 'SupprimerEquipe':
        DbOrganisateur::SupprimerEquipe($_GET['id_equipe']);
        header("Location: index.php?ctl=Organisateur&action=ListeEquipes");
        break;
    

//  ========== FIN MENU EQUIPES =============== //


//  ========== MENU STADE =============== //

    // Affichage des stades
    case 'ListeStades':
        $result = DbOrganisateur::ListeStades();
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/ListeStades.php';
        break;

    // Form Ajout stade
    case 'FormAjoutStade':
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/FormAjoutStade.php';
        break;

    // Creation de stade
    case 'AjouterStade':
        $total_cat=0; $liste_cat=[];
        // Regrouper les catégories dans une liste + récupération du total de catégorie créee
        for ($i=1; $i <= $_POST['inputCount']; $i++) { 
            $total_cat+=$_POST['categorie_'.$i];
            array_push($liste_cat, $_POST['categorie_'.$i]);
        }
        // Nb Catégories != capacité stade
       if ($total_cat != $_POST['capacite']) {
            echo'<script> window.history.back(); </script>';
       }
        
        DbOrganisateur::AjouterStade($_POST['nom_stade'], $_POST['capacite'], $liste_cat);
        header("Location: index.php?ctl=Organisateur&action=ListeStades");
        break;

    // Supprimer un stade
    case 'SupprimerStade':
        DbOrganisateur::SupprimerStade($_GET['id_stade']);
        header("Location: index.php?ctl=Organisateur&action=ListeStades");
        break;

    // Form Modifier Stade
    case 'FormModifierStade':
        $result = DbOrganisateur::GetInfoStade($_GET['id_stade']);
        include './vue/UI/Organisateur/Header.php';
        include './vue/UI/Organisateur/FormModifierStade.php';
        break;

    // Modifier un stade
    case 'ModifierStade':
        DbOrganisateur::ModifierStade($_POST['id_stade'], $_POST['nom_stade'], $_POST['capacite']);
        header("Location: index.php?ctl=Organisateur&action=ListeStades");
        break;

//  ========== FIN MENU STADE =============== //


//  ========== MENU UTILISATEURS =============== //

    case 'vuelisteUser':
        $id = isset($_GET['id']) ? $_GET['id'] : null; // Vérifie si l'ID est présent dans la requête GET
        DbOrganisateur::infoUser($id);
        include './vue/UI/Organisateur/listeUser.php';
        break;
            
    case "editUser":
        $id = $_GET['id'];
        $status = $_GET['s'];
        if ($status == 0){
            $infoI = DbOrganisateur::infoUserU($id);
        }else{
            $infoUserU = DbOrganisateur::infoUserA($id);
        }
        include './vue/UI/Utilisateur/vueEdituser.php';
        break;
            
    case "vueUtilisateur":
        $listeUserU = DbOrganisateur::listeUserU();
        //$listeUserA = DbOrganisateur::listeUserA();
        include './vue/UI/Utilisateur/listeUser.php';
        break;
    
    case "deleteUser":
        $id = $_GET['id'];
        $deleteUser = DbOrganisateur::deleteUser($id);
        
        ?><script>document.location="index.php?ctl=Organisateur&action=vuelisteUser&message=delete"</script><?php
        break;
        
    case "vuelisteUser":
        if ($_SESSION['status'] == 'Administrateur') {
            $listeUserU = DbOrganisateur::listeUtilisateurU();
            $listeUserA = DbOrganisateur::listeUtilisateurA();
            include './vue/UI/Organisateur/listeUser.php';
        }
        break;
            
    case "infoUser":
        $id = $_GET['id'];
        $infoUtilisateur = DbOrganisateur::infoUser($id);
        include './vue/UI/Organisateur/infoUser.php';
        break;

//  ========== FIN MENU UTILISATEURS =============== //

}



?>
