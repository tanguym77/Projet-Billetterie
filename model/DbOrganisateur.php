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
		$stmt = connectPdo::getObjPdo()->prepare("SELECT id_evenement, nom_match FROM evenement;");
		$stmt->execute();
		$result = $stmt->fetchall();
		return $result;
	}

	public static function ajout_billet($match_id, $prix, $nb_billets)
	{
		for ($i=0; $i < $nb_billets; $i++) {
			$stmt = connectPdo::getObjPdo()->prepare("INSERT INTO `billets` (`prix`, `id_evenement`) VALUES ( (?), (?) );");
			$stmt->execute([$prix, $match_id]);
		}
	}
}

?>