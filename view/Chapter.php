<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1> Chapitres du "Billet simple pour l'Alaska" </h1>

<p class="prev_page"><a href="index.php"> Retour à la liste des chapitres</a></p>

<div class="chapter">														<!--Affichage du chapitre -->
	<h3>
		<?= htmlspecialchars($post['title']) ?>
		<em> Mis en ligne le <?= $post['date_fr'] ?></em>
	</h3>

	<p>
		<?= nl2br(htmlspecialchars($post['content'])) ?>
	</p>
</div>
<div class ="commentaires">
<h2>Commentaires</h2>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">   <!-- Création et publication d'un commentaire sur un chapitre -->
	<div>
		<label for="author"> Auteur</label><br />
		<input type="text" id="author" name="author" />
	</div>
	<div>
		<label for="comment">Commentaire</label><br />
		<textarea id="comment" name="comment"></textarea>
	</div>
	<div>
		<input type="submit" />
	</div>
</form>

<?php
while ($comment = $comments->fetch())	/** Affichage des commentaire du chapitre sur lequel nous nous trouvons **/
{
?>
	<p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_comment_fr'] ?>
	<p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>


<?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>