<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php require('header.php'); ?>
<?php ob_start(); ?>

<p class="titreChapitres">Billet simple pour l'Alaska</p>

<div class="containerChapter">

<?php
while ($data = $posts->fetch())			/** Affiche tout les chapitres de la base de données **/
{
?>
	<div class="chapter">
		<h2>
			<?= htmlspecialchars($data['title']) ?>
		</h2>
		<p class="dateParution"><em> Mis en ligne le <?= $data['date_fr'] ?></em></p>
		<p class="contentChapter">
			<?= nl2br($data['content']) ?>
			<br /><br />
		</p>
			<em><a class="fullChapter" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Voir le Chapitre</a></em><!-- Permet de rejoindre la page d'un chapitre -->
	</div>


<?php
}
$posts->closeCursor();
?>

</div>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>