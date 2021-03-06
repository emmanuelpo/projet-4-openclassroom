<?php

namespace OpenClassrooms\projetopenclassroom\controller;

require_once('model/ChapterConnexion.php');


class ChapterController
{
	public function main(){

		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

		$posts = $postManager->lastPost();

		require('view/main.php');
	}

	public function listChapter($page)					/** Permet d'afficher la liste des chapitre en appelant le fichier html listChapter.php **/
	{
		$postParPage = 5;
		$depart = ($page - 1) * $postParPage ;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
		$posts = $postManager->getPosts($depart,$postParPage);
		
		$countReq = $postManager->countPosts();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);

		require('admin/backend/listChapters.php');
	}

	public function visitorView($page)		/** Permet d'afficher la liste des chapitre en appelant le fichier html visitorView.php **/
	{
		$postParPage = 5;
		$depart = ($page - 1) * $postParPage ;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
		$posts = $postManager->getPosts($depart,$postParPage);

		$countReq = $postManager->countPosts();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);
		
		require('view/visitorView.php');
	}

	public function writeChapter()				   /** Appelle la page permettant d'écrire de nouveau chapitre **/
	{
		require('admin/backend/addChapter.php');
	}

	public function addChapter($title,$content)	/** Permet de créer de nouveau chapitre **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

		$affectedLines = $postManager->postChapter($title,$content);

		if ($affectedLines === false){
			die('Impossible d\'ajouter le chapitre !');
		}
		else {
			header('Location: index.php?action=listChapter');
		}
	}

	public function editChapter($id)					/** Permet d'éditer des chapitres existants **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

		$post = $postManager->getPost($id);

		if (!empty($_POST['title']) && !empty($_POST['content'])) {
			$postManager->editChapter($_GET['id'], $_POST['title'], $_POST['content']);
			header('Location: index.php?action=listChapter');
		}

		require('admin/backend/editChapter.php');

	}

	public function deleteChapter($id)				/** Permet de supprimer des chapitres existants **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

        $post = $postManager->getPost($id);

        if (isset($_GET['id'])) {
           $postManager->deleteChapter($_GET['id']);
           header('Location: index.php?action=listChapter');
        }

	}
}