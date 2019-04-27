<?php

class Connexion
{
	protected function dbConnect()
	{
		$db = new \PDO('mysql:host=localhost;dbname=jean_forteroche;charset=utf8','root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ));
		return $db;
	}
}