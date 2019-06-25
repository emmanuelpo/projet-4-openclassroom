<?php

namespace OpenClassrooms\projetopenclassroom\controller;

require_once('model/LoginConnexion.php');

class LoginController
{
	public function loginValid()          /** Permet de se connecter à la page d'administration **/
	{
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);
		//$password = password_hash($password, PASSWORD_BCRYPT); Le temps de mettre le site en ligne (faire un password_hash au moment de la mise en ligne du site)

		$loginManager = new \OpenClassrooms\projetopenclassroom\model\LoginConnexion();

		$account = $loginManager->getLogin($username);

		if ($account){
			$pass = password_verify($password, $account['password']);
			if($pass){
				$_SESSION["active"] = TRUE;
				header('Location: index.php?action=listChapter');
			}else{
				$_SESSION['erreurLogin'] = "Mauvais login ou mot de passe";
				session_destroy();
			}
		}else{
			$_SESSION['erreurLogin'] = "Mauvais login ou mot de passe";
			session_destroy();
		}
		require('view/login.php');
	}
	public function loginPage()
	{
		require('view/login.php');		
	}

	public function logout()
	{
		if (isset($_SESSION["active"])){
			session_destroy();
		}
		header ('Location: index.php');
	}

}