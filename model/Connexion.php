<?php

namespace OpenClassrooms\projetopenclassroom\model;

abstract class Connexion  /** Classe permettant la connexion à la base de données **/
{
	private $dbname ="jean_forteroche";
	private $user = "root";
	private $pass = "";

	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname='.$this->dbname.';charset=utf8',$this->user,$this->pass,array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ));
		return $db;
	}
}