<?php
//include './model/Connexion.php';
require_once 'Connexion.php';

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

    public static function info_matchs($id_evenement){

    }
    
}

?>