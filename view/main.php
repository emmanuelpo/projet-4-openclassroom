<?php require('header.php'); ?>
<?php ob_start(); ?>


<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>