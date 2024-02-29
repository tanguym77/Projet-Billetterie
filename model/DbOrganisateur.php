<?php
include './model/Connexion.php';

class DbOrganisateur{

	public static function info_form_create()
	{
		$stmt = connectPdo::getObjPdo()->prepare("SELECT evenement.nom_match, stades.libelle_sta FROM evenement, stades WHERE evenement.libelle_sta = stades.libelle_sta;");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}

}

?>