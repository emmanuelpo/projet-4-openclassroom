<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class LoginConnexion extends Connexion
{
	public function getLogin($login)
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT password,id FROM admin WHERE login = :login');
		$req->execute(array(":username"=>$username));

		$logincheck = $req->fetch();

		return $logincheck;
	}
}