<?php
include './model/DbUtilisateur.php';
$action = $_GET['action'];

switch ($action) {

    // Vue générale
    case 'Accueil':
        include './vue/Utilisateur/Header.php';
        include './vue/Utilisateur/Accueil.php';
        include './vue/Utilisateur/Footer.php';
        break;

//  ========== MENU VOIR LES MATCHS =============== //
    case 'ListMatch':
        // Récupération des infos de la list des matchs
        $result = DbUtilisateur::list_evenements();
        include './vue/Utilisateur/Header.php';
        include './vue/Utilisateur/ListMatch.php';
        include './vue/Utilisateur/Footer.php';
        break;

    case 'DetailMatch':
        $result = DbUtilisateur::info_matchs($_GET['evenement']); // Info générales
        $billets_reserve = DbUtilisateur::billets_reserve($_GET['evenement']);
        $billets_dispo = DbUtilisateur::billets_dispo($_GET['evenement']);
        $info_zone = DbUtilisateur::info_zone($_GET['evenement']);
        $prix_zone = DbUtilisateur::prix_zone($_GET['evenement']);
        include './vue/Utilisateur/Header.php';
        include './vue/Utilisateur/DetailMatch.php';
        include './vue/Utilisateur/Footer.php';
        break;

//  ========== FIN MENU VOIR LES MATCHS =============== //


//  ========== RESERVATIONS =============== //

    case 'Reserver':
        // L'utilisateur n'est pas connecté
        if ($_SESSION['nom']==null) {
            $_SESSION['evenement'] = $_POST['evenement'];
            header("Location: index.php?ctl=Connexion&action=FormLogin");
        }
        include './vue/Utilisateur/Header.php';
        include './vue/Utilisateur/FormReservation.php';
        include './vue/Utilisateur/Footer.php';
        break;

    case 'Payer':
        $date = date("Y-m-d");
        for ($i=0; $i < $_POST['quantite']; $i++) { 
            $UnBillet = DbUtilisateur::GetUnBillet($_POST['id_evenement'], $_POST['id_zone']);
            DbUtilisateur::ReserverUnBillet($_SESSION['id_utilisateur'], $UnBillet['id_billet'], $date);
        }
        header("Location: index.php?ctl=Utilisateur&action=MesBillets");
        break;

//  ========== FIN RESERVATIONS =============== //


//  ========== MENU MES BILLETS =============== //
    case 'MesBillets':
        // Récupération des billets de l'utilisateur
        
        $LesBillets = DbUtilisateur::MesBillets($_SESSION['id_utilisateur']);
        include './vue/Utilisateur/Header.php';
        include './vue/Utilisateur/MesBillets.php';
        include './vue/Utilisateur/Footer.php';
        break;

    case 'GenererUnPdf':
        // Générer le pdf d'un billet
        GenererPdf($_GET['id_billet'],1,null);
        break;

    case 'GenererDesPdf':
        // Récupérer le nombre de page à imprimer et l'id des billets
        $LesIdBillets = DbUtilisateur::GetLesIdBillets($_GET['id_evenement'], $_SESSION['id_utilisateur']);
        $NbPdf = count($LesIdBillets);
        GenererPdf(null, $NbPdf, $LesIdBillets);
        break;

//  ========== FIN MENU MES BILLETS =============== //

        
}

    function GenererPdf($IdBillet, $NbPdf, $LesIdBillets){
        define('FPDF_FONTPATH','./fpdf/font');
        require('./fpdf/fpdf.php');

        $pdf = new FPDF();
        
        // Si 1 page
        if ($IdBillet != null) {
            $InfoBillet = DbUtilisateur::InfoBillet($IdBillet);
            GenererUnePage($pdf, $IdBillet, $InfoBillet['nom_match'], $InfoBillet['date_match'], $InfoBillet['nom_stade'], $InfoBillet['libelle_zone'], $InfoBillet['prix'], $InfoBillet['nom'], $InfoBillet['prenom']);
        }else {
            // Sinon on génère X pages
            for ($x=0; $x < $NbPdf; $x++) { 
                $InfoBillet = DbUtilisateur::InfoBillet($LesIdBillets[$x]['id_billet']);
                GenererUnePage($pdf, $InfoBillet['id_billet'], $InfoBillet['nom_match'], $InfoBillet['date_match'], $InfoBillet['nom_stade'], $InfoBillet['libelle_zone'], $InfoBillet['prix'], $InfoBillet['nom'], $InfoBillet['prenom']);
            }
        }

        $pdf->Output('I', $InfoBillet['nom_match']."_billet_".$IdBillet.".pdf");
    }

    function GenererUnePage($pdf, $IdBillet, $nom_match, $date_match, $nom_stade, $libelle_zone, $prix, $nom, $prenom){
        
        $pdf->AddPage();
        
        // HEADER
        $pdf->Image('vue/image/ballon-de-football.png',10,6,30,0,'','https://marmier-tanguy.alwaysdata.net/');
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(200,10,$nom_match,0,1,'C');
        $pdf->Cell(200,10,$date_match,0,1,'C');
        $pdf->Cell(200,10,$nom_stade,0,1,'C');

        $pdf->Ln(50);

        // Affichage des infos
        $pdf->SetFont('Arial','',15);

        $pdf->Cell(50);
        $pdf->Cell(50,10,"Billet ",0,0,'C');
        $pdf->Cell(50,10,$IdBillet,0,1,'C');

        $pdf->Cell(50);
        $pdf->Cell(50,10,"Nom de l'acheteur : ",0,0,'C');
        $pdf->Cell(50,10,$prenom."  ".$nom,0,1,'C');

        $pdf->Cell(50);
        $pdf->Cell(50,10,"Prix : ",0,0,'C');
        $pdf->Cell(50,10,$prix." euros",0,1,'C');

        $pdf->Ln(25);$pdf->Cell(50);
        $pdf->Cell(50,10,"Categorie : ",0,0,'C');
        $pdf->Cell(50,10,$libelle_zone,0,1,'C');

        $pdf->Ln(25);$pdf->Cell(50);
        $pdf->SetFont('Arial','B',15);
        $pdf->Cell(100,10,"Bon Match !",0,0,'C');
    }
?>
