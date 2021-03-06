<?php

namespace OpenClassrooms\projetopenclassroom\controller;

require_once('model/CommentConnexion.php');

class CommentController
	{

	public function listComment()	/** Permet d'afficher les commentaires d'un chapitre **/
	{
		$postManager = new \OpenClassrooms\projetopenclassroom\model\ChapterConnexion();
		$commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

		$post = $postManager->getPost($_GET['id']);
		$comments = $commentManager->getComments($_GET['id']);

		require('view/Chapter.php');
	}

	public function addComment($FK_post, $author, $comment)  /** Permet d'ajouter un commentaire dans un chapitre **/
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

	public function deleteComment($id)	/** Permet de supprimer un commentaire d'un chapitre **/
	{
		$commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

		$deleteComment = $commentManager->deleteComment($id);
        header('Location: ' . $_SERVER['HTTP_REFERER']);
	}

	public function listReport()                                /** Permet d'afficher la liste des commentaires signalés   **/
    {
        $commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

        $reportList = $commentManager->postReportComment();

        return $reportList;

    }

    public function reportComment($id,$FK_post)                             /**Permet de signaler un commentaire **/
    {
        $commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

        $report = $commentManager->reportComment($id);
        header('Location: index.php?action=post&id='. $FK_post);
    }

    public function validComment($id)                             /**Permet de valider un commentaire signalé **/
    {
        $commentManager = new \OpenClassrooms\projetopenclassroom\model\CommentConnexion();

        $report = $commentManager->validComment($id);
        header('Location: index.php?action=listChapter');
    }
}
