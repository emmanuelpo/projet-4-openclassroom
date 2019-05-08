<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class CommentConnexion extends Connexion
{
	public function getComments($postId)		/**Récupération des commentaires dans la table comments de la base de données **/
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments where FK_post = ? ORDER BY date_comment DESC');
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

	public function getComment($commentId)
	{
		$db = $this->dbConnect();
		$request = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, FK_post FROM comments WHERE id = ?');
		$request->execute(array($commentId));
		$comment = $request->fetch();
		$request->closeCursor();
		return $comment;
	}

	public function deleteComment($id,$author,$comment)	/** Préparation à la suppression d'un commentaire dans la base de données **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id = ?, author = ?, comment = ?');
		return $req;
	}
}