<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class CommentConnexion extends Connexion
{
	public function getComments($FK_post)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr, FK_post FROM comments where FK_post = ? ORDER BY date_comment DESC');
		$comments->execute(array($FK_post));

		return  $comments;
	}

	public function postComment($FK_post, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(FK_post, author, comment, date_comment) VALUES (?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($FK_post, $author, $comment));

		return $affectedLines;
	}

	public function getComment($id)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, author, comment, DATE_FORMAT(date_comment, \'%d/%m/%Y à %Hh%imin%ss\') AS date_comment_fr FROM comments where id = ?');
		$req->execute(array($id));
		$comment = $req->fetch();

		return $comment;
	}
}