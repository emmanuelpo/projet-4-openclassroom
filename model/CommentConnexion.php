<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class CommentConnexion extends Connexion
{
	public function getComments($postId)		/**Récupération des commentaires dans la table comments de la base de données **/
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin\') AS date_comment_fr FROM comments WHERE FK_post = ? ORDER BY date_comment DESC');
		$comments->execute(array($postId));

		return $comments;
	}

	public function postComment($postId, $author, $comment)	/** Préparation à l'insertion d'un commentaire dans la base de données **/
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(FK_post, author, comment, date_comment) VALUES (?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));

		return $affectedLines;
	}

	public function reportComment($id) /** Préparation au report d'un commentaire dans la base de données **/
	{
		$db = $this->dbConnect();
		$rep = $db->prepare('UPDATE comments SET report = TRUE WHERE id = ?');
		$newReport  = $rep->execute(array($id));

		return $newReport;
	}

	public function validComment($id) /** Préparation à la validation d'un commentaire qui a été reporté dans la base de données **/
	{
		$db = $this->dbConnect();
		$rep = $db->prepare('UPDATE comments SET report = FALSE WHERE id = ?');
		$newValid  = $rep->execute(array($id));

		return $newReport;
	}

    public function postReportComment() /** Récupération des commentaires reportés de la base de données **/
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments where report = TRUE ORDER BY date_comment DESC');
        $comments->execute();

        return $comments;
    }


	public function deleteComment($id)	/** Préparation à la suppression d'un commentaire dans la base de données **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?');
		$req->execute(array($id));

		return $req;
	}


}