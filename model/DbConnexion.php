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

	public static function userPassword($email)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT `password` FROM `utilisateur` WHERE mail=(?)");
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		return $result;
	}
	
	public static function changeProfil($nom,$prenom,$email,$mdp)
	{
		$stmt = connectPdo::getObjPdo()->prepare("UPDATE `utilisateur` SET `nom` = (?), `prenom` =(?), `mail` = (?) WHERE `utilisateur`.`password` = (?)");
		$stmt->execute([$nom,$prenom,$email,$mdp]);
		$result = $stmt->fetch();
		return $result;
	}

	public static function changeProfil2($nom,$prenom,$mdp)
	{
		$stmt = connectPdo::getObjPdo()->prepare("UPDATE `utilisateur` SET `nom` = (?), `prenom` =(?) WHERE `utilisateur`.`password` = (?)");
		$stmt->execute([$nom,$prenom,$mdp]);
		$result = $stmt->fetch();
		return $result;
	}

	public static function verifEmail($email)
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT `mail` FROM `utilisateur` WHERE mail=(?)");
		$stmt->execute([$email]);
		$result = $stmt->fetch();
		return $result;
	}

}

?>