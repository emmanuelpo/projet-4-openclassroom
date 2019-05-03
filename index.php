<?php
require('controller/Chapter_frontend.php');
require('controller/Comment_frontend.php');
try{
if (isset($_GET['action'])) {
	if ($_GET['action'] == 'listChapter'){
		listChapter();
	}
	elseif ($_GET['action'] == 'listComment'){
		if (isset($_GET['id']) && $_GET['id'] > 0) {
			listComment();
		}
		else{
			throw new Exception('Erreur: aucun identifiant de chapitre envoyé');
		}
	}
	elseif ($_GET['action'] == 'addComment') {
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
	}
	else{
		listChapter();
	}
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ';
}