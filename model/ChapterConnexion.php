<?php

namespace OpenClassrooms\projetopenclassroom\model;

require_once("model/Connexion.php");

class ChapterConnexion extends Connexion
{
	public function getPosts() /** Récupération des chapitres pour leur affichage **/
	{
		$db = $this->dbConnect();
		$req = $db->query('SELECT id, title, content, DATE_FORMAT(date_hours, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM post WHERE state = TRUE ORDER BY date_hours DESC LIMIT 0, 5 ') ; 

		return $req;

	}

	public function getPost($postId) /** Récupération des chapitres dans un tableau **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, title, content, DATE_FORMAT(date_hours, \'%d/%m/%Y à %Hh%i\') AS date_fr FROM post WHERE id = ?');
		$req->execute(array($postId));
		$post = $req->fetch();

		return $post;
	}

	public function postChapter($id) /** Préparation à l'insertion d'un chapitre dans la table post **/
	{
		$db = $this->dbConnect();
		$chapters = $db->prepare('INSERT INTO post(FK_admin, title, content, date_hours) VALUES(1, ?, ?, NOW())');
		$affectedLines = $chapters->execute(array($title, $content));

		return $affectedLines;

	}

	public function editChapter($id,$title,$content)	/** Préparation de la modification d'un chapitre dans la table post **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET title = :title, content = :content, date_hours = NOW() WHERE id = :id');
		$newChapter = $req->execute(array('id' => $id, 'content' =>$content));

		return $newChapter;
	}

	public function deleteChapter($id,$title,$content) /** Préparation de la suppression d'un chapitre dans la table post **/
	{
		$db = $this->dbConnect();
		$req = $db->prepare('UPDATE post SET state = FALSE WHERE id = ?');
		return $req;
	}
}