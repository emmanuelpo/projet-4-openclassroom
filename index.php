<?php
require('controller/Chapter_frontend.php');
require('controller/Comment_frontend.php');
require('controller/Login_frontend.php');

$chap = new \OpenClassrooms\projetopenclassroom\controller\ChapterController();
$comment = new \OpenClassrooms\projetopenclassroom\controller\CommentController();
$login = new \OpenClassrooms\projetopenclassroom\controller\LoginController();

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listChapter') { /** Récupérer la liste des chapitres sur la page **/
            $chap->listChapter();
        } elseif ($_GET['action'] == 'post') { /** Récupérer la liste des commentaires sur un chapitre **/
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $comment->listComment();
            } else {
                throw new Exception('Erreur: aucun identifiant de chapitre envoyé');
            }
        } elseif ($_GET['action'] == 'visitorView'){  /** Aller sur la page des chapitres (mode visiteur) **/
        	$chap->visitorView();
        } elseif ($_GET['action'] == 'login'){ 		  /** Aller sur la page de connexion **/
        	$login->loginPage();
        } elseif ($_GET['action'] == 'addComment') {  /** Ajouter un commentaire sur un chapitre **/
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $comment->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    echo 'Erreur: tout les champs ne sont pas remplis !';
                }
            } else {
                echo 'Erreur! aucun identifiant de chapitre envoyé';
            }
        } elseif ($_GET['action'] == 'signalComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $comment->reportComment($_GET['id'],$_GET['post']);
            }
        } elseif ($_GET['action'] == 'validComment') {
        	if (isset($_GET['id']) && $_GET['id'] > 0) {
        		$comment->validComment($_GET['id']);
        	}
        }elseif ($_GET['action'] == 'deleteComment') { /** Supprimer un commentaire sur un chapitre **/
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $comment->deleteComment($_GET['id']);
            } else {
                throw new Exception("Aucun identifiant de commentaire envoyé ");
            }
        } elseif ($_GET['action'] == 'addChapter') {     /** Ajouter un chapitre **/
            if (!empty($_POST)) {
                if (!empty($_POST['title']) && !empty($_POST['content'])) {
                    $chap->addChapter($_POST['title'], $_POST['content']);
                } else {
                    echo 'Erreur: tout les champs ne sont pas remplis !';
                }
            } else {
                $chap->writeChapter();	/** Aller sur la page pour écrire un nouveau chapitre **/
            }
        } elseif ($_GET['action'] == 'editChapter') {  /** Editer un chapitre **/
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $chap->editChapter($_GET['id']);
            } else {
                throw new Exception("Aucun identifiant de chapitre envoyé");
            }
        } elseif ($_GET['action'] == 'deleteChapter') {
            /** Supprimer un chapitre **/
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $chap->deleteChapter($_GET['id']);
            } else {
                throw new Exception("Aucun identifiant de chapitre envoyé ");
            }
        }
    } else {
        $chap->main();
        /** Renvoie à la première page du site **/
    }

