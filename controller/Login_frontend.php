<?php

namespace OpenClassrooms\projetopenclassroom\controller;

require_once('model/LoginConnexion.php');

class LoginController
{
	public function loginValid($pseudo,$pass)
	{
		$loginManager = new \OpenClassrooms\projetopenclassroom\model\LoginConnexion($pseudo,$pass);

		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);

		$goodPassword = password_verify($password, $pass['password']);

		if(!$pass){
			echo 'Mauvais mot de passe !';
		}else{
			if($goodPassword){
				session_start();
				$_SESSION['id']= $pass['id'];
				$_SESSION['login'] = $pseudo;
			}else{
				echo 'Mauvais identifiant ou mot de passe' ;
			}
		}
		
		
	}
	public function loginPage()
	{

		//if(!empty($_POST["username"]) && !empty($_POST["password"])){

			
		//	if($username === /** mettre l'élément login de la bdd **/ AND $password === /** mettre l'élément mdp de la bdd **/){

		//	} 
		    
		//} else {
		//	header('Location: index.php?action=login');
		//}
		//else{
		//	header('Location: index.php?action=login');
		//}

		require('view/login.php');
		
	}

}