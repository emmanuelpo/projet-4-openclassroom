<?php $title = 'Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<h2 class="titreView">Billet simple pour l'Alaska</h2>

<article class="containerChapter">

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
				<?php  echo substr(nl2br($data['content']),0,500); ?>...
				<br /><br />
			</p>
			<p>
				<em><a class="fullChapter" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em><!-- Permet de rejoindre la page d'un chapitre -->
			</p>
		</div>


	<?php
	}
	$posts->closeCursor();
	?>

</article>

<div class="pagination">
    <p class ="nbPages">Pages: 
    	<?php
    	for($i=1;$i<=$pagesTotales;$i++) {
    		  echo '<a class ="nbPages" href="index.php?action=visitorView&page='.$i.'"> '.$i.' </a>'  ;
    		}
    ?></p>
</div>

<?php require('view/footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('admin/backend/template.php'); ?>