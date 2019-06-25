<nav id="menu">        <!-- Header/menu sur toutes les pages -->
    <div class="element_menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <?php if(!isset($_SESSION["active"])) {
            	echo ('<li><a href="index.php?action=visitorView">Chapitres</a></li>');
            }?>
            <?php if(isset($_SESSION["active"])) {
            		echo ('<li><a href="index.php?action=listChapter">Page d\'admiministration</a></li>');
            		echo ('<li><a href="index.php?action=logout">Deconnexion</a></li>');
            	  }else{
            	   	echo '<li><a href="index.php?action=login">Connexion</a></li>';
            	   } ?>
        </ul>
    </div>    
</nav>