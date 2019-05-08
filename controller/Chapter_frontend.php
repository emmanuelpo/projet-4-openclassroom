<?php

require_once('model/ChapterConnexion.php');

function listChapter()					/** Permet d'afficher la liste des chapitre en appelant le fichier html listChapter.php **/
{
	$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
	$posts = $postManager->getPosts();
	

	require('view/listChapters.php');
}

function writeChapter()				   /** Appelle la page permettant d'écrire de nouveau chapitre **/
{
	require('view/addChapter.php');
}

function addChapter($id,$title,$content)	/** Permet de créer de nouveau chapitre **/
{
	$affectedLines = postChapter($id,$title,$content);

	if ($affectedLines === false){
		die('Impossible d\'ajouter le chapitre !');
	}
	else {
		header('Location: index.php?action=addChapter&id='. $id);
	}
}

function editChapter($id)					/** Permet d'éditer des chapitres existants **/
{
	$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

	$post = $postManager->getPost($postId);

	if (!empty($_POST['title']) && !empty($_POST['content'])) {
		$postManager->editChapter($postId, $_POST['title'], $_POST['content']);
		header('Location: index.php?action=post&id=' .$post['id']);
	}

	require('view/listChapters.php');
}

function deleteChapter($id)				/** Permet de supprimer des chapitres existants **/
{
	$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

	$deleteLines = $postManager->deleteChapter($id,$title,$content);
}
