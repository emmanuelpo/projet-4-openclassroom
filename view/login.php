<?php $title = 'Page de connexion'; ?>

<?php ob_start(); ?>


<section id="loginform">
	<div id="erreurLogin">
    		<?php if (isset($_SESSION['erreurLogin'])){
    			echo ($_SESSION['erreurLogin']);
    		} ?>
    </div>
    <form  method="post">
	<div class="forminput">
        <label for="login" class="login">Login:</label>
        <input type="text" name="username" id="login" required="required"/><br />
    </div>
    <div class="forminput">
        <label for="password"> Mot de Passe:</label>
        <input type="password" name="password" id="password" required="required"/><br />
    </div>
    <input type="submit" name="submit" value="Se connecter" class="submit"/>
	</form>
</section>

<footer id="footerLogin">
	<p class="copyright"> © 2019 Copyright Jean Rochefort : Billet Simple pour l'Alaska </p>
	<p class="space">Tout droits réservés et toute reproduction interdite </p>
</footer>

<?php $content = ob_get_clean(); ?>

<?php require('admin/backend/template.php'); ?>