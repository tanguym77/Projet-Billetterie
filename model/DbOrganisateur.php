<?php
include './model/Connexion.php';

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


//  ========== MENU STADE =============== //

	// Retourne la liste des stades
	public static function ListeStades()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM stades;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

    // Ajoute un stade
	public static function AjouterStade($nom_stade, $capacite)
	{
        $stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `stades` (`nom_stade`, `capacite`) VALUES ((?), (?) )");
        $stmt->execute([$nom_stade, $capacite]);
	}

    // Supprimer un stade
	public static function SupprimerStade($id_stade)
	{
        $stmt = connectPdo::getObjPdo()->prepare("DELETE FROM `stades` WHERE `stades`.`id_stade` = (?)");
        $stmt->execute([$id_stade]);
	}
	
    // Récupère les infos d'un stade pour le formulaire
	public static function GetInfoStade($id_stade)
	{
        $stmt = connectPdo::getObjPdo()->prepare("SELECT stades.nom_stade, stades.capacite FROM stades WHERE stades.id_stade = (?);");
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


//  ========== FIN MENU STADE =============== //

	



	public static function infoUser($id)
{
	try {
		$sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
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


  
    
}

?>