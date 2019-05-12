-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 12 mai 2019 à 23:24
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jean_forteroche`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'JeanForterocheAlaska', 'AlaskaLife');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `report` tinyint(1) NOT NULL DEFAULT '0',
  `date_comment` datetime NOT NULL,
  `FK_post` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `author`, `comment`, `report`, `date_comment`, `FK_post`) VALUES
(1, 'Yvain le cavalier Lion', 'Très bon début d\'aventure', 0, '2019-04-28 12:19:15', 1),
(2, 'Perceval', 'J\'aime beaucoup', 0, '2019-05-03 13:35:24', 2),
(3, 'Gauvin', 'Cool l\'histoire', 0, '2019-05-05 14:00:59', 2),
(4, 'Arthour', 'Pas changer assiette pour fromage', 0, '2019-05-05 14:02:26', 1),
(5, 'Gauvin', 'La suite', 0, '2019-05-07 15:47:02', 2),
(6, 'Arthour', 'bonjour', 0, '2019-05-09 11:13:34', 3),
(7, 'Gauvin', 'efzfzef', 0, '2019-05-11 12:19:33', 3),
(8, 'Gauvin', 'okey', 0, '2019-05-12 01:18:37', 3);

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `FK_admin` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `date_hours` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_admin` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `FK_admin`, `title`, `content`, `state`, `date_hours`) VALUES
(1, 1, 'Un début de voyage du bon pied ', 'Lorem Ipsum', 1, '2019-04-20 15:32:31'),
(2, 1, 'Un voyage semé d\'embûches', 'Pour l\'instant, mon début de voyage commence bien ', 1, '2019-04-21 09:21:20'),
(3, 1, 'La suite du voyage', '<p><strong>Je prends la <em>rel&egrave;ve ici et maintenant ou la bas peut &ecirc;tre ici</em></strong></p>', 0, '2019-05-12 01:22:59'),
(5, 1, 'Salut', '<p>bonjour 123456 bonjour bonjour</p>', 1, '2019-05-12 00:11:54'),
(6, 1, 'oqesrihfuerhierbg', '<p>r,gujerbgiuergr&nbsp;<strong>rtgergregerg<em>ergergergreg<span style=\"text-decoration: line-through;\">ergergergrgeregre</span></em></strong></p>', 0, '2019-05-12 17:31:14'),
(7, 1, 'trherg', '<p>regerg</p>', 0, '2019-05-12 17:31:17'),
(8, 1, 'Probleme et résolution', '<p><em>Test 3 et 4</em></p>', 1, '2019-05-13 00:18:57'),
(9, 1, 'Lorem Ipsum', '<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Has autem provincias, quas Orontes ambiens amnis imosque pedes Cassii montis illius celsi praetermeans funditur in Parthenium mare, Gnaeus Pompeius superato Tigrane regnis Armeniorum abstractas dicioni Romanae coniunxit.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Verum ad istam omnem orationem brevis est defensio. Nam quoad aetas M. Caeli dare potuit isti suspicioni locum, fuit primum ipsius pudore, deinde etiam patris diligentia disciplinaque munita. Qui ut huic virilem togam dedit&scaron;nihil dicam hoc loco de me; tantum sit, quantum vos existimatis; hoc dicam, hunc a patre continuo ad me esse deductum; nemo hunc M. Caelium in illo aetatis flore vidit nisi aut cum patre aut mecum aut in M. Crassi castissima domo, cum artibus honestissimis erudiretur.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Proinde concepta rabie saeviore, quam desperatio incendebat et fames, amplificatis viribus ardore incohibili in excidium urbium matris Seleuciae efferebantur, quam comes tuebatur Castricius tresque legiones bellicis sudoribus induratae.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Soleo saepe ante oculos ponere, idque libenter crebris usurpare sermonibus, omnis nostrorum imperatorum, omnis exterarum gentium potentissimorumque populorum, omnis clarissimorum regum res gestas, cum tuis nec contentionum magnitudine nec numero proeliorum nec varietate regionum nec celeritate conficiendi nec dissimilitudine bellorum posse conferri; nec vero disiunctissimas terras citius passibus cuiusquam potuisse peragrari, quam tuis non dicam cursibus, sed victoriis lustratae sunt.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Ideo urbs venerabilis post superbas efferatarum gentium cervices oppressas latasque leges fundamenta libertatis et retinacula sempiterna velut frugi parens et prudens et dives Caesaribus tamquam liberis suis regenda patrimonii iura permisit.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Ideo urbs venerabilis post superbas efferatarum gentium cervices oppressas latasque leges fundamenta libertatis et retinacula sempiterna velut frugi parens et prudens et dives Caesaribus tamquam liberis suis regenda patrimonii iura permisit.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Utque proeliorum periti rectores primo catervas densas opponunt et fortes, deinde leves armaturas, post iaculatores ultimasque subsidiales acies, si fors adegerit, iuvaturas, ita praepositis urbanae familiae suspensae digerentibus sollicite, quos insignes faciunt virgae dexteris aptatae velut tessera data castrensi iuxta vehiculi frontem omne textrinum incedit: huic atratum coquinae iungitur ministerium, dein totum promiscue servitium cum otiosis plebeiis de vicinitate coniunctis: postrema multitudo spadonum a senibus in pueros desinens, obluridi distortaque lineamentorum conpage deformes, ut quaqua incesserit quisquam cernens mutilorum hominum agmina detestetur memoriam Samiramidis reginae illius veteris, quae teneros mares castravit omnium prima velut vim iniectans naturae, eandemque ab instituto cursu retorquens, quae inter ipsa oriundi crepundia per primigenios seminis fontes tacita quodam modo lege vias propagandae posteritatis ostendit.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Saepissime igitur mihi de amicitia cogitanti maxime illud considerandum videri solet, utrum propter imbecillitatem atque inopiam desiderata sit amicitia, ut dandis recipiendisque meritis quod quisque minus per se ipse posset, id acciperet ab alio vicissimque redderet, an esset hoc quidem proprium amicitiae, sed antiquior et pulchrior et magis a natura ipsa profecta alia causa. Amor enim, ex quo amicitia nominata est, princeps est ad benevolentiam coniungendam. Nam utilitates quidem etiam ab iis percipiuntur saepe qui simulatione amicitiae coluntur et observantur temporis causa, in amicitia autem nihil fictum est, nihil simulatum et, quidquid est, id est verum et voluntarium.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Quanta autem vis amicitiae sit, ex hoc intellegi maxime potest, quod ex infinita societate generis humani, quam conciliavit ipsa natura, ita contracta res est et adducta in angustum ut omnis caritas aut inter duos aut inter paucos iungeretur.</p>\r\n<p style=\"color: #5e5737; font-size: 10px; margin: 10px; font-family: Verdana, Arial, Helvetica, sans-serif; background-color: #ffffff;\">Alii summum decus in carruchis solito altioribus et ambitioso vestium cultu ponentes sudant sub ponderibus lacernarum, quas in collis insertas cingulis ipsis adnectunt nimia subtegminum tenuitate perflabiles, expandentes eas crebris agitationibus maximeque sinistra, ut longiores fimbriae tunicaeque perspicue luceant varietate liciorum effigiatae in species animalium multiformes.</p>', 0, '2019-05-13 00:19:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
