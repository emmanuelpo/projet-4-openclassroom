<?php require('header.php'); ?>
<?php ob_start(); ?>

<a href="index.php?action=removeChapter&amp;id=<?= $_GET['id'] ?>"> Supprimer le chapitre</a>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>