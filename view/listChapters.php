<nav id="menu">        
    <div class="element_menu">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="index.php?action=visitorView">Chapitres</a></li>
            <li><a href="index.php?action=login">Déconnexion</a></li>
        </ul>
    </div>    
</nav>
<?php ob_start(); ?>

<h1 class="titreView">Page d'administration</h1>


<div class="containerChapter">

    <?php
    while ($data = $posts->fetch())			/** Affiche tout les chapitres de la base de données **/
    {
    ?>
        <div class="chapter">
            <h2>
                <?= htmlspecialchars($data['title']) ?>
                <em><a class="modifChapter" href="index.php?action=editChapter&amp;id=<?= $data['id'] ?>"> (Modifier le Chapitre)</a></em>
            </h2>
            <p class="dateParution"><em> Mis en ligne le <?= $data['date_fr'] ?></em></p>
                <?php  echo substr(nl2br($data['content']),0,500); ?>...
                <br /><br />
                <em><a class="fullChapter" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em><!-- Permet de rejoindre la page d'un chapitre -->
        </div>


    <?php
    }
    $posts->closeCursor();
    ?>
    <div class="pagination">
	    <p class ="nbPages">Pages:<?php
	    	for($i=1;$i<=$pagesTotales;$i++) {
	    		  echo  ' <a class ="nbPages" href="index.php?action=listChapter&page='.$i.'"> '.$i.' </a>'  ;
	    		}
	    ?></p>
	</div>

</div>

<div id="addChapter">
	<a href="index.php?action=addChapter">Ajouter un Chapitre</a>
</div>

<h3 id="commentSignal"> Commentaires signalés</h3>

<div id="signalsComment">
    

   <?php
   $comment = new \OpenClassrooms\projetopenclassroom\controller\CommentController();
   $reportList = $comment->listReport();
    while ($reports = $reportList->fetch())			/** Affiche tout les chapitres de la base de données **/
    {
    ?>
        <div class="comment_publish">
            <p><strong><?= htmlspecialchars($reports['author']) ?></strong> le <?= $reports['date_comment_fr'] ?><a href="index.php?action=validComment&amp;id=<?= $reports['id'] ?>"> (Valider le commentaire)</a> <a href="index.php?action=deleteComment&amp;id=<?= $reports['id'] ?>"> (Supprimer le commentaire)</a>
            <p><?= nl2br(htmlspecialchars($reports['comment'])) ?></p>
        </div>

    <?php
    }
    $reportList->closeCursor();
    ?>

</div>

<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>