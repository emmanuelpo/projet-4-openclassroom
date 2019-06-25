<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class LoginConnexion extends Connexion
{
	public function getLogin($pseudo)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT * FROM admin WHERE login = :login');
		$req->execute(array(":login"=>$pseudo));

		$logincheck = $req->fetch();

		return $logincheck;
	}
}