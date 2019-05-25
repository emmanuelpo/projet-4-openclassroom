<?php

namespace OpenClassrooms\projetopenclassroom\controller;

require_once('model/ChapterConnexion.php');


class ChapterController
{
	public function main(){

		require('view/main.php');
	}

	public function listChapter($page)					/** Permet d'afficher la liste des chapitre en appelant le fichier html listChapter.php **/
	{
		$postParPage = 2;
		$depart = ($page - 1) * $postParPage ;
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
		$posts = $postManager->getPosts($depart,$postParPage);
		
		$countReq = $postManager->countPosts();
		$countPosts = $countReq->rowCount();
		$pagesTotales = ceil($countPosts/$postParPage);

		require('view/listChapters.php');
	}

	public function visitorView()					/** Permet d'afficher la liste des chapitre en appelant le fichier html visitorView.php **/
	{

		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
		$posts = $postManager->getPosts($depart,$postParPage);
		

		require('view/visitorView.php');
	}

	public function writeChapter()				   /** Appelle la page permettant d'écrire de nouveau chapitre **/
	{
		require('view/addChapter.php');
	}

	public function addChapter($title,$content)	/** Permet de créer de nouveau chapitre **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

		$affectedLines = $postManager->postChapter($title,$content);

		if ($affectedLines === false){
			die('Impossible d\'ajouter le chapitre !');
		}
		else {
			header('Location: index.php?action=addChapter&id='. $id);
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

		require('view/editChapter.php');

	}

	public function deleteChapter($id)				/** Permet de supprimer des chapitres existants **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

        $post = $postManager->getPost($id);

        if (isset($_GET['id'])) {
           $postManager->deleteChapter($_GET['id']);
           header('Location: index.php');
        }

	}

	public function countChapter()
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();

		$post = $postManager->

		$postsPerPage = 5;
	}

}