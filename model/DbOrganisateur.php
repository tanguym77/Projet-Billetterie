<?php
include './model/Connexion.php';

class DbOrganisateur{

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
	
	// Retourne la liste des stades
	public static function list_stades()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM stades;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

	// Retourne la liste des matchs
	public static function list_match()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT id_evenement, nom_match FROM evenement;");
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