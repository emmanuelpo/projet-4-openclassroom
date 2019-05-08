<?php
require('controller/Chapter_frontend.php');
require('controller/Comment_frontend.php');
try{
	if (isset($_GET['action'])) {
		if ($_GET['action'] == 'listChapter'){      /** Récupérer la liste des chapitres sur la page **/
			listChapter();
		}
		elseif ($_GET['action'] == 'post'){			/** Récupérer la liste des commentaires sur un chapitre **/
			if (isset($_GET['id']) && $_GET['id'] > 0 ) {
				listComment();
			}
			else{
				throw new Exception('Erreur: aucun identifiant de chapitre envoyé');
			}
		}
		elseif ($_GET['action'] == 'writeChapter'){
			writeChapter();
		}
		elseif ($_GET['action'] == 'addComment') {        /** Ajouter un commentaire sur un chapitre **/
			if (isset($_GET['id']) && $_GET['id'] > 0){
				if (!empty($_POST['author']) && !empty($_POST['comment'])) {
					addComment($_GET['id'], $_POST['author'], $_POST['comment']);
				}
				else {
					echo 'Erreur: tout les champs ne sont pas remplis !';
					}
				}
			else{
					echo 'Erreur! aucun identifiant de chapitre envoyé';
			}
		}
		elseif ($_GET['action'] == 'deleteComment') {					/** Supprimer un commentaire sur un chapitre **/
			if(isset($_GET['id']) && $_GET['id'] > 0){
				deleteChapter($_GET['id']);
			}
			else{
				throw new Exception("Aucun identifiant de commentaire envoyé ");
			}
		}
		elseif ($_GET['action'] == 'addChapter') {	 					 /** Ajouter un chapitre **/
			if (isset($_GET['id']) && $_GET['id'] > 0){
				if (!empty($_POST['title']) && !empty($_POST['content'])) {
					addChapter($_GET['id'], $_POST['title'], $_POST['content']);
				}
				else {
					echo 'Erreur: tout les champs ne sont pas remplis !';
					}
				}
			else{
					echo 'Erreur! aucun identifiant de chapitre envoyé';
			}
		}
		elseif ($_GET['action'] == 'editChapter'){						/** Editer un chapitre **/
			if(isset($_GET['id']) && $_GET['id'] > 0){
				editChapter($_GET['id']);	
			}
			else{
				throw new Exception("Aucun identifiant de chapitre envoyé");
			}
		}
		elseif ($_GET['action'] == 'deleteChapter'){ 					/** Supprimer un chapitre **/
			if(isset($_GET['id']) && $_GET['id'] > 0){
				deleteChapter($_GET['id']);
			}
			else{
				throw new Exception("Aucun identifiant de chapitre envoyé ");
			}
		}
	}
	else{
		listChapter();													/** Renvoie à la première page du site **/
	}
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ';
}