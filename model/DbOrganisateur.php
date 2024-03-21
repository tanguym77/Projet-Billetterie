<?php
include './model/Connexion.php';

// Fonction pour sauvegarder le logo de l'équipe
function AjouterPhotoEquipe($photo_equipe){
    if ($_FILES['photo_equipe']['error']==0)
    {
        // TEST DE LA TAILLE
        if ($_FILES['photo_equipe']['size'] <= 1000000000000)
        {
            // TEST EXTENSION
            $fileInfo = pathinfo($_FILES['photo_equipe']['name']);
            $extension = $fileInfo['extension'];
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'PNG'];
            if (in_array($extension, $allowedExtensions)){
                // On peut valider le fichier et le stocker définitivement
                move_uploaded_file($_FILES['photo_equipe']['tmp_name'], 'uploads/equipes/'.basename($photo_equipe));
            }
        }
    }
}

class DbOrganisateur{

//  ========== MENU ACCUEIL =============== //

	// Retourne les infos générales sur les matchs
	public static function list_billets()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT id_evenement, nom_match, date_match, nom_stade FROM evenement e, stades s WHERE e.id_stade = s.id_stade;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

	// Retourne les équipes d'un match
	public static function list_equipes($id_evenement)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT nom_equipe FROM equipes e, jouer j WHERE j.id_equipe = e.id_equipe AND j.id_evenement = (?);");
		$stmt->execute([$id_evenement]);
		$result = $stmt->fetchall();
		return $result;
	}

//  ========== FIN MENU ACCUEIL =============== //


//  ========== MENU BILLETS =============== //
    // Ajoute X billets dans la base pour un evenement
	public static function GetEvenements()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM evenement;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

	// Ajoute X billets dans la base pour un evenement
	public static function ajout_billet($nb_billets, $prix, $id_evenement, $id_zone)
	{
		for ($i=0; $i < $nb_billets; $i++) {
			$stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `billets` (`prix`, `id_evenement`, `id_zone`) VALUES ( (?), (?), (?) )");
			$stmt->execute([$prix, $id_evenement, $id_zone]);
		}
	}

    // Retourne les zones d'un stade
	public static function info_zone($id_evenement)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT zones.id_zone, zones.libelle_zone FROM zones, stades, evenement WHERE zones.id_stade = stades.id_stade AND stades.id_stade = evenement.id_stade AND evenement.id_evenement = (?);");
        $stmt->execute([$id_evenement]);
        $result = $stmt->fetchall();
        return $result;
	}

//  ========== FIN MENU BILLETS =============== //


//  ========== MENU EQUIPES =============== //

    // Recupérer la liste des équipes
    public static function ListeEquipes()
    {
        $stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM equipes;");
        $stmt->execute();
        $result = $stmt->fetchall();
        return $result;
    }

    // Ajouter une équipe + sauvegarder la photo
    public static function AjouterEquipe($nom_equipe, $photo_equipe)
	{
        // Sauvegarde de la photo
        AjouterPhotoEquipe($photo_equipe);

        var_dump($photo_equipe);
        $stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `equipes` (`nom_equipe`, `photo_equipe`) VALUES ( (?) , (?) )");
        $stmt->execute([$nom_equipe, $photo_equipe]);
	}

    // Récupère les infos d'une equipe pour le formulaire
	public static function GetInfoEquipe($id_equipe)
	{
        $stmt = connectPdo::getObjPdo()->prepare("SELECT nom_equipe, photo_equipe FROM equipes WHERE id_equipe = (?);");
		$stmt->execute([$id_equipe]);
		$result = $stmt->fetch();
		return $result;
	}

    // Modifier une equipe
	public static function ModifierEquipe($id_equipe, $nom_equipe, $photo_equipe)
	{
        // Sauvegarde de la photo
        AjouterPhotoEquipe($photo_equipe);
        
        $stmt = connectPdo::getObjPdo()->prepare("UPDATE equipes SET `nom_equipe` = (?), photo_equipe = (?) WHERE `id_equipe` = (?);");
        $stmt->execute([$nom_equipe, $photo_equipe, $id_equipe]);
	}

    // Précise si il existe une photo
	public static function Existe_Photo_Equipe($id_equipe){
		$stmt = connectPdo::getObjPdo()->prepare("SELECT photo_equipe FROM equipes WHERE id_equipe = ?");
		$stmt->execute([$id_equipe]);
		$result = $stmt->fetch();
		return $result;
	}

    // Supprimer une equipe
	public static function SupprimerEquipe($id_equipe)
	{
        //Supprimer l'image du serveur
		$stmt = connectPdo::getObjPdo()->prepare("SELECT photo_equipe FROM equipes WHERE id_equipe = (?) ;");
		$stmt->execute([$id_equipe]);
		$result = $stmt->fetch();
		if($result['photo_equipe'] != null){
			$url = "uploads/equipes/".$result['photo_equipe'];
			unlink($url);
		}

        $stmt = connectPdo::getObjPdo()->prepare("DELETE FROM `equipes` WHERE `equipes`.`id_equipe` = (?)");
        $stmt->execute([$id_equipe]);
	}


//  ========== FIN MENU EQUIPES =============== //


//  ========== MENU STADE =============== //

	// Retourne la liste des stades
	public static function ListeStades()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM stades;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

    // Ajoute un stade et ses catégories (zones)
	public static function AjouterStade($nom_stade, $capacite, $liste_cat)
	{
        // Ajout du stade
        $stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `stades` (`nom_stade`, `capacite`) VALUES ((?), (?) )");
        $stmt->execute([$nom_stade, $capacite]);

        // Récupérer l'id du dernier stade crée et on créer les catégories
        $id_stade = DbOrganisateur::GetInfoStade(DbOrganisateur::GetDernierStade()[0]['id_stade'])['id_stade'];
        
        for ($i=0; $i < count($liste_cat); $i++) { 
            $nb_place = $liste_cat[$i];
            $libelle_zone = "Catégorie ".($i+1);
            $stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `zones` (`libelle_zone`, `nb_place`, `id_stade`) VALUES ( (?), (?), (?) )");
            $stmt->execute([$libelle_zone, $nb_place, $id_stade]);
        }
	}

    // Récupère les infos d'un stade pour le formulaire
	public static function GetDernierStade()
	{
        $stmt = connectPdo::getObjPdo()->prepare("SELECT stades.id_stade FROM stades ORDER BY stades.id_stade DESC;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

    // Récupère les infos d'un stade pour le formulaire
	public static function GetInfoStade($id_stade)
	{
        $stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM stades WHERE stades.id_stade = (?);");
		$stmt->execute([$id_stade]);
		$result = $stmt->fetch();
		return $result;
	}

    // Modifier un stade
	public static function ModifierStade($id_stade, $nom_stade, $capacite)
	{
        $stmt = connectPdo::getObjPdo()->prepare("UPDATE `stades` SET `nom_stade` = (?), `capacite` = (?) WHERE `id_stade` = (?);");
        $stmt->execute([$nom_stade, $capacite, $id_stade]);
	}

    // Supprimer un stade
	public static function SupprimerStade($id_stade)
	{
        $stmt = connectPdo::getObjPdo()->prepare("DELETE FROM `stades` WHERE `stades`.`id_stade` = (?)");
        $stmt->execute([$id_stade]);
	}
	

//  ========== FIN MENU STADE =============== //

	



//  ========== MENU UTILISATEUR =============== //

	public static function infoUser($id_utilisateur)
{
	try {
		$sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
		$user = connectPdo::getObjPdo()->prepare($sql);
		$user->bindValue(':id_utilisateur', $id_utilisateur);
		$user->execute();
		$liste = $user->fetch();
		return $liste;
	} catch (PDOException $e) {
		echo $e->getMessage();
		die("Erreur dans la BDD ");
	}
}

public static function infoUser2($id_utilisateur)
{
	try {
		$sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
		$result = connectPdo::getObjPdo()->prepare($sql);
		$result->bindValue(':id_utilisateur', $id_utilisateur);
		$result->execute();
		$liste = $result->fetchAll();
		return $liste;
	} catch (PDOException $e) {
		echo $e->getMessage();
		die("Erreur dans la BDD ");
	}
}

public static function infoUserU($id)
    {
        try {
            $sql = "SELECT * FROM utilisateur WHERE status = 0";
            $result = connectPdo::getObjPdo()->prepare($sql);
            $result->bindValue(':id', $id);
            $result->execute();
            $liste = $result->fetchAll();
            return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }

	public static function infoUserA($id)
    {
        try {
            $sql = "SELECT * FROM utilisateur WHERE status = 1";
            $result =connectPdo::getObjPdo()->prepare($sql);
            $result->bindValue(':id', $id);
            $result->execute();
            $liste = $result->fetch();
            return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }


	public static function listeUserU()
    {
        try {
            $sql = "SELECT * FROM utilisateur WHERE status = 0";
            $result = connectPdo::getObjPdo()->query($sql);
            $liste = $result->fetchAll();
            return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }


	public static function listeUserA()
    {
        try {
            $sql = "SELECT * FROM utilisateur WHERE status = 1";
            $result = connectPdo::getObjPdo()->query($sql);
            $liste = $result->fetchAll();
            return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }

    // Modifier un utilisateur
    public static function ModifierUtilisateur($id_utilisateur, $nom, $prenom, $mail, $password, $status)
    {
        try {
            // Prépare la requête de mise à jour avec des paramètres nommés
            $stmt = connectPdo::getObjPdo()->prepare("UPDATE utilisateur SET `nom` = :nom, `prenom` = :prenom, `mail` = :mail, `password` = :password, `status` = :status WHERE `id_utilisateur` = :id_utilisateur");
    
            // Exécute la requête en liant les valeurs des paramètres nommés
            $stmt->execute(array(
                ':id_utilisateur' => $id_utilisateur,
                ':nom' => $nom,
                ':prenom' => $prenom,
                ':mail' => $mail,
                ':password' => $password,
                ':status' => $status
            ));
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

	public static function deleteUser($id)
    {
        try {
            $sql = "DELETE FROM utilisateur WHERE id_utilisateur = :id";
            $result = connectPdo::getObjPdo()->prepare($sql);
            $result->bindValue(':id', $id);
            $result->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }

//  ========== FIN MENU UTILISATEUR =============== //

  
    
}

?>