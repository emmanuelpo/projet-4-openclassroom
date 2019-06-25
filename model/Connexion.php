<?php

namespace OpenClassrooms\projetopenclassroom\model;

abstract class Connexion  /** Classe permettant la connexion à la base de données **/
{
	private $dbname ="officedupfep";
	private $user = "officedupfep";
	private $pass = "Clad2007";

	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=officedupfep.mysql.db;dbname='.$this->dbname.';charset=utf8',$this->user,$this->pass,array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ));
		return $db;
	}
}