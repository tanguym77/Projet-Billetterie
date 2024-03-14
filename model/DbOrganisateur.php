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
	public static function list_stade()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT stades.libelle_sta FROM stades;");
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
	public static function ajout_billet($match_id, $prix, $nb_billets)
	{
		for ($i=0; $i < $nb_billets; $i++) {
			$stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `billets` (`prix`, `id_evenement`) VALUES ( (?), (?) );");
			$stmt->execute([$prix, $match_id]);
		}
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


    public static function editUser($nom, $prenom, $email, $statut, $id) {
               try {
            $sql = "UPDATE utilisateur SET nom = :nom, prenom = :prenom, mail = :mail, status = :status WHERE id_utilisateur = :id";
            $result = ModelPdo::$pdo->prepare($sql);
            $result->bindValue(':nom', $nom);
            $result->bindValue(':prenom', $prenom);
            $result->bindValue(':mail', $email);
            $result->bindValue(':status', $statut);
            $result->bindValue(':id', $id);
            $result->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD edituser ");
        }
    }

    public static function editUserEmail($email, $id) {
        try {
            echo $email;
            $sql = "UPDATE utilisateur SET mail = :email WHERE id_utilisateur = :id";
            $result = ModelPdo::$pdo->prepare($sql);
            $result->bindValue(':email', $email);
            $result->bindValue(':id', $id);
            $result->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD editUserEmail");
        }
    
        // Vérifier si l'email a été modifié
        $emailUpdated = false;
        try {
            $sql = "SELECT COUNT(*) as count FROM utilisateur WHERE id_utilisateur = :id AND mail = :email";
            $result = ModelPdo::$pdo->prepare($sql);
            $result->bindValue(':id', $id);
            $result->bindValue(':email', $email);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if ($row['count'] > 0) {
                $emailUpdated = true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD edituserEmail2 ");
        }
    
        // Si l'email a été modifié, envoyer le mail
        if ($emailUpdated) {
            try {
                $sql = "SELECT mail, id_utilisateur FROM utilisateur  WHERE id_utilisateur = :id";
                $result = DbConnexion::$pdo->prepare($sql);
                $result->bindValue(':id', $id);
                $result->execute();
                $liste = $result->fetch(PDO::FETCH_ASSOC);
                if ($liste) {
                    //self::mailEditMail($liste['emailUtilisateur'], $liste['identifiantUtilisateur']);
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                die("Erreur dans la BDD lors de l'envoi de l'email");
            }
        }
        
    }

    public static function editUserPassword($password, $id) {
        try {
            // Mise à jour le mot de passe de l'utilisateur avec le mot de passe fourni
            $sql = "UPDATE utilisateur SET password = :password WHERE id_utilisateur = :id";
            $result = DbConnexion::$pdo->prepare($sql);
            $result->bindValue(':password', $password);
            $result->bindValue(':id', $id);
            $result->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD editUserPassword");
        }
    
        try {
            // Récupérer l'adresse mail et l'identifiant de l'utilisateur
            $sql = "SELECT mail, id_utilisateur FROM utilisateur  WHERE id_utilisateur = :id";
            $result = ModelPdo::$pdo->prepare($sql);
            $result->bindValue(':id', $id);
            $result->execute(); 
            $liste = $result->fetch(); 
        } catch (PDOException $e) {
            echo $e->getMessage();
            die("Erreur dans la BDD edituserpassword2");
        }
    
        // Envoyer un mail à l'utilisateur
        self::mailEditMail($liste['mail'], $liste['id_utilisateur']);
    }
    
}

?>