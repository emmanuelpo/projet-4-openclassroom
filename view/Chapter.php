<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="backgroundChapter">

    <h2 class="titreView">Billet simple pour l'Alaska</h2>

    <article class="containerChapter">
        <div class="chapter">														<!--Affichage du chapitre -->
        	<h3>
                <?= htmlspecialchars($post['title']) ?>
        	</h3>
            <em class="date_publish"> Mis en ligne le <?= $post['date_fr'] ?></em>
        	<p>
        		<?= nl2br($post['content']) ?>
        	</p>
            <p class="prev_page">
            	<?php if(isset($_SESSION["active"])){
            		echo('<a href="index.php?action=listChapter"> Retour à la liste des chapitres</a>');
            	}else{
            		echo ('<a href="index.php?action=visitorView"> Retour à la liste des chapitres</a>');
            	}?>
            </p>
        </div>
    </article>

    <section class ="commentaires">  
        <?php
        while ($comment = $comments->fetch())	/** Affichage des commentaire du chapitre sur lequel nous nous trouvons **/
        {
        ?>
            <div class="comment_publish">
                <p class="signalComment"><strong class="commentPseudo"><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['date_comment_fr'] ?> <a  href="index.php?action=signalComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $_GET['id'] ?>"> (Signaler le commentaire)</a><?php
                    if(isset($_SESSION["active"])) { ?>
                        <a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&amp;post=<?= $_GET['id'] ?>"> (Supprimer le commentaire)</a><?php
                    }?></p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>

            </div>
        <?php
        }
        ?>
    </section>

    <section class="comment_form">

        <h2>Poster votre Commentaire</h2>

        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">   <!-- Création et publication d'un commentaire sur un chapitre -->
            <div>
                <label for="author"> Auteur</label><br />
                <input type="text" id="author" name="author" />
            </div><br />
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment" rows="8" cols="40"></textarea>
            </div>
            <div>
                <input type="submit" />
            </div>
        </form>
    </section>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('admin/backend/template.php'); ?>