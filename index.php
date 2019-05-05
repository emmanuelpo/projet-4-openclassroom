<?php

require('controller/Chapter_frontend.php');
require('controller/Comment_frontend.php');

function matchWithAction()
{
    /**
     * For switch usage
     * @see https://www.php.net/manual/en/control-structures.switch.php
     */
    switch ($_GET['action']) {
        case 'addComment':
            if (!isset($_GET['id'])) {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
            if ($_GET['id'] < 1) { // instead of 0
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }

            if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST)) {
                throw new Exception('Une erreur est survenue durant l\'ajout du commentaire !');
            }

            if (empty($_POST['author']) || empty($_POST['comment'])) {
                throw new Exception('Tout les champs ne sont pas remplis !');
            }

            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            break;
        case 'listChapter':
            listChapter();
            break;
        /**
         * See view/listChapters.php line 22
         */
        case 'post': // instead of 'listComment'
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                listComment();
            }

            throw new Exception('Aucun identifiant de chapitre envoyé');
            break;
        default:
            listChapter();
            break;
    }
}

try {
    matchWithAction();
} catch (Throwable $e) { // S'il y a eu une erreur, alors...
    /**
     * For sprintf usage
     * @see https://www.php.net/manual/en/function.sprintf.php
     */
    echo sprintf('%s: %s', 'Erreur', $e->getMessage());
}
