<?php ob_start(); ?>

<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=kj5j9xphg0gftti8bnn7r6wejkyn8f8zyii8mqhxdzxmvnhq"></script>
  <script>tinymce.init({selector:'textarea'});</script>
</head>

<p class="prev_page"><a href="../index.php"> Retour à la liste des chapitres !</a></p>

<form action="index.php?action=addChapter&amp;" method="post">
		<div>
		<label for="title"> Titre du Chapitre </label>
		<input type="varchar" id="title" name="title" />
	</div>
	<div>
		<label for="content"></label><br />
		<textarea id="content" name="content"></textarea>
	</div>	
	<div>
		<input type="submit" />
	</div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>