<?php

require_once('model/CommentConnexion.php');

function listComment()	/** Permet d'afficher les commentaires d'un chapitre **/
{
	$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
	$commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/Chapter.php');
}

function addComment($FK_post, $author, $comment)  /** Permet d'ajouter un commentaire dans un chapitre **/
{
	$commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

	$affectedLines = $commentManager->postComment($FK_post, $author, $comment);

	if ($affectedLines === false) {
		die('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id='. $FK_post);
	}
}

function deleteComment($FK_post, $author, $comment)	/** Permet de supprimer un commentaire d'un chapitre **/
{
	$commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

	$deleteComment = $commentManager->deleteComment($id,$author,$comment);
}