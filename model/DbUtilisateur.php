<?php
include './model/Connexion.php';

class DbUtilisateur{

public static function infoUser($id)
{
	try {
		$sql = "SELECT * FROM utilisateur WHERE id-utilisateur = :id";
		$result = ModelPdo::$pdo->prepare($sql);
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
            $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
            $result = ModelPdo::$pdo->prepare($sql);
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
            $sql = "SELECT * FROM utilisateur WHERE id_utilisateur = :id";
            $result = ModelPdo::$pdo->prepare($sql);
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
            $result = ModelPdo::$pdo->query($sql);
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
            $result = ModelPdo::$pdo->query($sql);
            $liste = $result->fetchAll();
            return $liste;
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD ");
        }
    }

    // Retourne les infos des evenements
    public static function list_evenements()
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

    // Retourne les détails de l'evenement passé en parametre
    public static function info_matchs($id_evenement){
        $stmt = connectPdo::getObjPdo()->prepare("SELECT nom_match, date_match, nom_equipe, nom_stade, capacite FROM evenement, jouer, equipes, stades WHERE evenement.id_evenement = jouer.id_evenement AND jouer.id_equipe = equipes.id_equipe AND evenement.id_stade = stades.id_stade AND evenement.id_evenement = (?);");
		$stmt->execute([$id_evenement]);
		$result = $stmt->fetchall();
		return $result;
    }

    
    // Retourne le nombre de billets réservés pour un évènement
    public static function billets_reserve($id_evenement){
        $stmt = connectPdo::getObjPdo()->prepare("SELECT COUNT(reserver.id_billet) AS billets_reserve FROM reserver, billets, evenement WHERE reserver.id_billet = billets.id_billet AND billets.id_evenement = evenement.id_evenement AND evenement.id_evenement = (?);");
		$stmt->execute([$id_evenement]);
		$result = $stmt->fetch();
		return $result;
    }

    // Retourne le nombre de billets dispo d'un evenement
    public static function billets_dispo($id_evenement){
        $stmt = connectPdo::getObjPdo()->prepare("SELECT COUNT(billets.id_billet)-(SELECT COUNT(reserver.id_billet) AS billets_reserve FROM reserver, billets, evenement WHERE reserver.id_billet = billets.id_billet AND billets.id_evenement = evenement.id_evenement AND evenement.id_evenement = (?)) AS billets_dispo FROM billets, evenement WHERE billets.id_evenement = evenement.id_evenement AND evenement.id_evenement = (?);");
		$stmt->execute([$id_evenement,$id_evenement]);
		$result = $stmt->fetch();
		return $result;
    }

    // Retourne les zones d'un stade
	public static function info_zone($id_evenement)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT zones.id_zone, zones.libelle_zone FROM zones, stades, evenement WHERE zones.id_stade = stades.id_stade AND stades.id_stade = evenement.id_stade AND evenement.id_evenement = (?);");
        $stmt->execute([$id_evenement]);
        $result = $stmt->fetchall();
        return $result;
	}

    // Retourne le prix des zones d'un evenement
	public static function prix_zone($id_evenement)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT DISTINCT billets.id_zone, billets.prix FROM billets, evenement WHERE billets.id_evenement = evenement.id_evenement AND evenement.id_evenement = (?);");
        $stmt->execute([$id_evenement]);
        $result = $stmt->fetchall();
        return $result;
	}

    // Retourne le nombre de place dispo d'une zone
	public static function dispo_zone($id_zone, $id_evenement)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT COUNT(billets.id_billet) AS Categorie_dispo FROM billets WHERE billets.id_billet NOT IN (SELECT reserver.id_billet FROM reserver) AND billets.id_zone = (?) AND billets.id_evenement = (?);");
        $stmt->execute([$id_zone, $id_evenement]);
        $result = $stmt->fetch();
        return $result;
	}
}

?>