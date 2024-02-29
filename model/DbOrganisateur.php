<?php
include './model/Connexion.php';

class DbOrganisateur{

	public static function list_stade()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT stades.libelle_sta FROM stades;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

	public static function list_match()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT evenement.nom_match FROM evenement;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}
}

?>