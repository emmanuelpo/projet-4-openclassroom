<?php require('header.php'); ?>
<?php ob_start(); ?>

<div id="loginform">
    <form action="login.php" method="post">
    	<div class="forminput">
	        <label for="login"> Login </label>
	        <input type="text" name="username" id="login"/><br />
	    </div>
	    <div class="forminput">
	        <label for="password"> Mot de Passe</label>
	        <input type="password" name="password" id="password"/><br />
	    </div>
        <input type="submit" name="submit" value="Se connecter" class="submit"/>
    </form>
</div>
<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>