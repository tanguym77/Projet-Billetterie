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

}

?>