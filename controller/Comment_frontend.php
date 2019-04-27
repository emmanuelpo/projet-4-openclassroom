<?php

require_once('model/CommentConnexion.php');

function listComment()
{
	$postManager = new \openclassroom\model\ChapterConnexion();
	$commentManager = new \openclassroom\model\CommentConnexion();

	$post = $postManager->getPost($_GET['id']);
	$comments = $commentManager->getComments($_GET['id']);

	require('view/.php');
}

function addComment($FK_post, $author, $comment)
{
	$commentManager = new \openclassroom\model\CommentConnexion();

	$affectedLines = $commentManager->postComment($FK_post, $author, $comment);

	if ($affectedLines === false) {
		die('Impossible d\'ajouter le commentaire !');
	}
	else {
		header('Location: index.php?action=post&id='. $FK_post);
	}
}