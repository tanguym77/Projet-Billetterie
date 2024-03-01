<?php
include './model/Connexion.php';

class DbConnection{

	public static function connectUser($email,$password)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT * FROM `utilisateur` WHERE mail=(?) AND password=(?)");
		$stmt->execute([$email, $password]);
		$result = $stmt->fetch();
		return $result;
	}

	public static function newUser($nom,$prenom,$email,$password)
	{
		$stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `utilisateur`(`id_utilisateur`, `nom`, `prenom`, `mail`, `password`, `status`) VALUES (NULL,?,?,?,?,'0')");
		$stmt->execute([$nom,$prenom,$email,$password]);
	}

}

?>