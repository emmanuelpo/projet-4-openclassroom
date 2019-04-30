<?php

require_once('model/ChapterConnexion.php');

function listChapter()
{
	$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
	$posts = $postManager->getPosts();

	require('view/listChapters.php');
}

function addChapter($id,$title,$content)
{
	$affectedLines = postChapter($id,$title,$content);

	if ($affectedLines === false){
		die('Impossible d\'ajouter le chapitre !');
	}
	else {
		header('Location: index.php?action=chapter=' . $id);
	}
}

function editChapter($id)
{
	$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

	$post = $postManager->getPost($postId);

	if (!empty($_POST['author']) && !empty($_POST['content'])) {
		$postManager->editChapter($postId, $_POST['author'], $_POST['content']);
		header('Location: index.php?action=post&id=' .$post['id']);
	}

	require('view/listChapters.php');
}

