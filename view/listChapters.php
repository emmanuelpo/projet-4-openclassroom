

<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<?php require('header.php'); ?>

<h1>Index</h1>
<p class="parution">Chapitres du "Billet simple pour l'Alaska" </p>

<?php
while ($data = $posts->fetch())
{
?>
	<div class="chapter">
		<h2>
			<?= htmlspecialchars($data['title']) ?>
			<em> Mis en ligne le <?= $data['date_hours'] ?></em>
		</h2>

		<p>
			<?= nl2br(htmlspecialchars($data['content'])) ?>
			<br />
			<em><a href=""> Commentaires</a></em>
		</p>
		
	</div>
}
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>