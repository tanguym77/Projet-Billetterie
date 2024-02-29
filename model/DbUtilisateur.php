<?php
include './model/Connexion.php';

public static function searchUtilisateur($search)
{
	try {
		$sql = "SELECT * FROM utilisateur WHERE (nom LIKE :search OR prenom LIKE :search OR email LIKE :search) AND status = 0";
		$result = ModelPdo::$pdo->prepare($sql);
		$result->bindValue(':search', $search);
		$result->execute();
		$liste = $result->fetchAll();
		return $liste;
	} catch (PDOException $e) {
		echo $e->getMessage();
		die("Erreur dans la BDD ");
	}
}

?>