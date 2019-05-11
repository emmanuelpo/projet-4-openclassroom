<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php require('header.php'); ?>
<?php ob_start(); ?>

<p class="parution">Chapitres du "Billet simple pour l'Alaska" </p>

<?php
while ($data = $posts->fetch())			/** Affiche tout les chapitres de la base de données **/
{
?>
	<div class="chapter">
		<h2>
			<?= htmlspecialchars($data['title']) ?>
			<em> Mis en ligne le <?= $data['date_fr'] ?></em> <em>
		</h2>
			<?= nl2br($data['content']) ?>
			<br /><br />
			<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em><!-- Permet de rejoindre la page d'un chapitre -->
	</div>


<?php
}
$posts->closeCursor();
?>


<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>