<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class LoginConnexion extends Connexion
{
	public function getLogin($pseudo,$pass)
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT password,id FROM admin WHERE login = :login');
		$req->execute(array(":username"=>$pseudo, ":password"=>$pass));

		$logincheck = $req->fetch();

		return $logincheck;
	}
}