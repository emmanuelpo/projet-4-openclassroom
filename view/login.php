<?php $title = 'Page de connexion'; ?>

<?php require('header.php'); ?>
<?php ob_start(); ?>


<div id="loginform">
    <form action="index.php?action=listChapter" method="post">
    	<div class="forminput">
	        <label for="login" class="login">Login:</label>
	        <input type="text" name="username" id="login"/><br />
	    </div>
	    <div class="forminput">
	        <label for="password"> Mot de Passe:</label>
	        <input type="password" name="password" id="password"/><br />
	    </div>
        <input type="submit" name="submit" value="Se connecter" class="submit"/>
    </form>
</div>

<div class="footerLogin">
	<p> © 2019 Copyright Jean Rochefort : Billet Simple pour l'Alaska </p>
	<p class="space">Tout droits réservés et toute reproduction interdite </p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>