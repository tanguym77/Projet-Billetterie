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
}

?>