<?php require('header.php'); ?>
<?php ob_start(); ?>

<div id="accueil">
	<h1> Billet simple pour l'Alaska </h1>
	<h2> Ecrit par Jean Forteroche </h2>
</div>

<div id="photoAuteur">
	<img src="public/image/jeanrochefort.jpg" alt="photo de l'auteur">
</div>

<div id="dernierChapitre">
	<div class="containerChapter">

		<?php
		while ($data = $posts->fetch())			/** Affiche le dernier chapitre de la base de données **/
		{
		?>
			<div class="chapter">
				<h2 class="lastChapterPublish"> Dernier Chapitre paru </h2>
				<h2>
					<?= htmlspecialchars($data['title']) ?>
				</h2>
				<p class="dateParution"><em> Mis en ligne le <?= $data['date_fr'] ?></em></p>
				<p class="contentChapter">
					<?php  echo substr(nl2br($data['content']),0,500); ?>...
					<br /><br />
				</p>
					<em><a class="fullChapter" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire le chapitre</a></em><!-- Permet de rejoindre la page d'un chapitre -->
			</div>


		<?php
		}
		$posts->closeCursor();
		?>
	</div>
</div>

<div id="quiSuisJe">
	<div class="containerChapter">
		<div class="container">
			<h2 class="lastChapterPublish"> Qui-suis-je ? </h2>
			<p class="maVie"> Bienvenue sur mon blog de voyage. Je m'appelle Jean Forteroche et j'ai 54 ans. Durant ma vie, j'ai parcouru le monde, traversé d'innombrables pays et découvert des cultures qui m'était totalement inconnu. J'aime aussi la musique classique notamment les grands orchestres d'opéra (j'ai un petit faible pour les douces notes de Beethoven).
			Epicurien et amateur de bon vin, je croque la vie à pleine dents et je fais toujours les choses à ma guise (vous l'attendiez n'est ce pas ?)</p>
		</div>
	</div>
</div>

<div id="resume">
	<div class="containerChapter">
		<div class="container">
			<h2 class="lastChapterPublish"> Résumé d'un Billet simple pour l'Alaska </h2>
			<p class="resume"><i>"Un jour, l'Homme découvrira la beauté de sa propre terre, de sa propre planète et ce jour là, il pourra vraiment la voir comme un être vivant et ressentir la vie qui la parcourt à chaque instant".</i> Oui cette phrase est de moi mais ce que je vais vous faire découvrir dans cette histoire vous fera la comprendre un peu mieux. A travers mes lignes, je vais vous faire découvrir cette belle région du monde qui est l'Alaska. Depuis mon arrivé sur l'île de Kodiak Island en passant par les montagnes enneigés de Denali. Ma route me fera aller entre les différents monts et découvrir de belles prairies. Les rencontres seront bien sur présente, parfois chaleureuse, parfois plus tumultueuses dirons nous. Mais que voulez vous, il faut de tout pour faire un monde.</p>
		</div>
	</div>
</div>


<?php require('footer.php'); ?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>