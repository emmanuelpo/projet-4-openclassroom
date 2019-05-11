<?php require('header.php'); ?>
<?php ob_start(); ?>

<head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=kj5j9xphg0gftti8bnn7r6wejkyn8f8zyii8mqhxdzxmvnhq"></script> <!-- Script de TinyMCE  -->
  <script>tinymce.init({selector:'textarea'});</script>
</head>

<p class="prev_page"><a href="index.php"> Retour à la liste des chapitres !</a></p>

<form action="index.php?action=editChapter" method="post"> <!-- Modification d'un article avec son titre et son texte -->
	<div>
		<label for="title"> Titre du Chapitre </label>
		<input type="varchar" id="title" name="title" value="<?= ($post['title']) ?>" />
	</div>
	<div>
		<label for="content"></label><br />
		<textarea id="content" name="content"><?= ($post['content']) ?></textarea>
	</div>	
	<div>
		<br/><input type="submit" />
	</div>
</form>


<a href="index.php?action=deleteChapter&amp;id=<?= $_GET['id'] ?>"> Supprimer le chapitre</a>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>