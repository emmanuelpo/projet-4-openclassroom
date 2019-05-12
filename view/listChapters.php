<?php require('header.php'); ?>
<?php ob_start(); ?>

<h1 id="adminTitle">Page d'administration du blog "Billet simple pour l'Alaska" par Jean Forteroche </h1>


<div id="containerChapter">

<?php
while ($data = $posts->fetch())			/** Affiche tout les chapitres de la base de données **/
{
?>
	<div class="chapter">
		<h2>
			<?= htmlspecialchars($data['title']) ?>
			<em> Mis en ligne le <?= $data['date_fr'] ?></em> <em><a href="index.php?action=editChapter&amp;id=<?= $data['id'] ?>"> Modifier le Chapitre</a></em>
		</h2>
			<?= nl2br($data['content']) ?>
			<br /><br />
			<em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em><!-- Permet de rejoindre la page d'un chapitre -->
	</div>


<?php
}
$posts->closeCursor();
?>

</div>

<div id="addChapter">
	<br />
	<a href="index.php?action=addChapter">Ajouter un Chapitre</a>
	
</div>

<div id="signalsComment">
    <h3> Commentaires signalés</h3>
</div>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>