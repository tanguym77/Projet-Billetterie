<?php

class connectPdo 
{
	private static $db; 
	
	private function __construct(){} 
	
	static function getObjPdo() {
		 
		if(!isset(self::$db))
		{
			self::$db = new PDO('mysql:dbname=marmier-tanguy_db_billetterie;host=mysql-marmier-tanguy.alwaysdata.net', '251835', 'Mot2Passe');
			self::$db->query('SET NAMES utf8');
			self::$db->query('SET CHARACTER SET utf8');
		} 
		return self::$db;
    }
}

?>