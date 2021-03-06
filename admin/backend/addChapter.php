<?php $title = 'Ajouter un chapitre'; ?>

<?php ob_start(); ?>

<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=kj5j9xphg0gftti8bnn7r6wejkyn8f8zyii8mqhxdzxmvnhq"></script> <!-- Script de TinyMCE  -->
  <script>tinymce.init({selector:'textarea'});</script>
</head>

<section class="chapterText">

	<p class="prev_page"><a href="index.php?action=listChapter"> Retour à la liste des chapitres !</a></p>

	<form action="index.php?action=addChapter" method="post">	<!-- Création d'un article avec son titre et son texte -->
		<div class="titleZone">
			<label for="title"> Titre du Chapitre </label>
			<input type="varchar" id="title" name="title" />
		</div>
		<div class="editZone">
			<label for="content"></label><br />
			<textarea id="content" name="content" style="height: 450px"></textarea>
		</div>	
		<div class="valider">
			<input type="submit" />
		</div>
	</form>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>