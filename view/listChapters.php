<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php require('header.php'); ?>
<?php ob_start(); ?>

<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=kj5j9xphg0gftti8bnn7r6wejkyn8f8zyii8mqhxdzxmvnhq"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</head>


<p class="parution">Chapitres du "Billet simple pour l'Alaska" </p>

<?php
while ($data = $posts->fetch())
{
?>
	<div class="chapter">
		<h2>
			<?= htmlspecialchars($data['title']) ?>
			<em> Mis en ligne le <?= $data['date_fr'] ?></em>
		</h2>

		<p>
			<?= nl2br(htmlspecialchars($data['content'])) ?>
			<br /><br />
			<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
		</p>
	</div>


<?php
}
$posts->closeCursor();
?>

<div>

	<em><a href="view/addChapter.php">Ajouter un Chapitre</a></em>
	
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>