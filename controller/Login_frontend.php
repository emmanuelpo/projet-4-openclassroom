<?php

namespace OpenClassrooms\projetopenclassroom\controller;

require_once('model/LoginConnexion.php');

class LoginController
{
	public function loginValid()
	{
		

		if(!empty($_POST["username"]) && !empty($_POST["password"])){
			$username = htmlspecialchars($_POST["username"]);
			$password = htmlspecialchars($_POST["password"]);
		}
	}

	public function loginPage()
	{
		require('view/login.php');
	}

}