<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class ChapterConnexion extends Connexion
{
	public function getPosts() /** Gets chapters data from jean_forteroche database**/
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(date_hours, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM post ORDER BY date_hours DESC LIMIT 0, 5 ') ; 

		return $req;

	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_hours, \'%d/%m/%Y à %Hh%imin%ss\') AS date_fr FROM post WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function postChapter($id,$title,$content)
	{
		$db = $this->dbConnect();
		$chapters = $db->prepare('INSERT INTO post(FK_admin, title, content, date_hours) VALUES(?, ?, ?, NOW())');
		$affectedLines = $chapters->execute(array($id, $title, $content));

		return $affectedLines;

	}

	public function updateChapter($id,$title,$content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET title = :title, content = :content, date_hours = NOW() WHERE id = :id');
		$newChapter = $req->execute(array('id' => $id, 'content' =>$content));

		return $newChapter;
	}

	public function deleteChapter($id,$title,$content)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM post WHERE id = ?, title = ?, content = ?');
		return $req;
	}
}