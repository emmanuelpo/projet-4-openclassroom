<?php

namespace OpenClassrooms\projetopenclassroom\model;

class Connexion  /** Classe permettant la connexion à la base de données **/
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8','root', '',array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ));
		return $db;
	}
}