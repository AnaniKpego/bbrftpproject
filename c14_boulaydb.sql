-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 12 Juin 2020 à 11:28
-- Version du serveur :  10.1.44-MariaDB-0+deb9u1
-- Version de PHP :  7.0.33-14+0~20191218.25+debian9~1.gbpae1889

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `c14_boulaydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `title`, `subtitle`, `description`, `created_at`, `updated_at`, `filename`) VALUES
(1, 'Auberges. Que sont-ils?', '<p><span style=\"color:#f1c40f\"><strong>Bien plus qu&#39;un simple endroit bon march&eacute;</strong> </span></p>\r\n\r\n<p>pour dormir, les auberges de jeunesse sont un moyen social de voyager et de rencontrer des personnes partageant les m&ecirc;mes id&eacute;es. Les espaces communs comme les cuisines.</p>', '<p style=\"text-align:center\">Bien plus qu&#39;un simple endroit bon march&eacute; pour dormir,</p>\r\n\r\n<p style=\"text-align:center\"><strong>les auberges de jeunesse sont un moyen social de voyager et de rencontrer des personnes partageant les m&ecirc;mes id&eacute;es. Les espaces communs comme les cuisines partag&eacute;es ou les salles de jeux sont d&#39;excellents moyens d&#39;&eacute;changer des conseils, des astuces et des r&eacute;cits de voyage avec des routards du monde entier.</strong></p>', '2020-03-27 18:24:26', '2020-04-03 23:30:09', '5e87c7018050e859452226.JPG'),
(2, 'Auberges. Que sont-ils?', 'Bien plus qu\'un simple endroit bon marché pour dormir, les auberges de jeunesse sont un moyen social de voyager et de rencontrer des personnes partageant les mêmes idées. Les espaces communs comme les cuisines.', 'Bien plus qu\'un simple endroit bon marché pour dormir, les auberges de jeunesse sont un moyen social de voyager et de rencontrer des personnes partageant les mêmes idées. Les espaces communs comme les cuisines partagées ou les salles de jeux sont d\'excellents moyens d\'échanger des conseils, des astuces et des récits de voyage avec des routards du monde entier.', '2020-03-27 18:25:39', '2020-03-27 18:25:39', '5e7e4523ec667885685007.png');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'KPEGO N\'DRIN ROGER', 'kpegowebmobile@gmail.com', 'Remerciement', 'BonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjour\r\nBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjourBonjour', '77576438', '2020-03-30 12:45:46', NULL),
(3, 'KPEGO N\'DRIN ROGER', 'kpegowebmobile@gmail.com', 'Remerciement', 'RemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciement', '77576438', '2020-03-30 12:55:04', NULL),
(4, 'KPEGO N\'DRIN ROGER', 'kpegowebmobile@gmail.com', 'Remerciement', 'RemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciementRemerciement', '77576438', '2020-03-30 12:56:39', NULL),
(5, 'KPEGO N\'DRIN ROGER', 'kpegowebmobile@gmail.com', 'Remerciement', 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '77576438', '2020-03-30 13:06:16', NULL),
(6, 'zezezez', 'rt@rt.com', 'rt', '<p>ezezeze</p>', 'ezezez', '2020-05-26 11:13:17', NULL),
(7, 'zezezez', 'rere@ererer.com', 'd', '<p>dsds</p>', 'rerrerere', '2020-05-26 11:15:00', NULL),
(8, 'kooulot', 'koualot@gmail.com', 'TEST', 'ygyttututu', '56779021', '2020-06-10 14:15:07', NULL),
(9, 'kooulot', 'koualot@gmail.com', 'TEST', 'ygyttututu', '56779021', '2020-06-10 14:15:08', NULL),
(10, 'boris michael', 'akawainnocent@gmail.com', 'VERIFICATION', 'lolo', '88906344', '2020-06-10 14:29:17', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `phone`, `email`, `start_at`, `created_at`, `updated_at`, `filename`, `subtitle`) VALUES
(1, 'Szeazrezteryrty', '<p>kpegowebmobile@gmail.comkpegowebmobile@gmail.</p>\r\n\r\n<p>comkpegowebmobile@gmail.comkpegowebmobile@gmail.</p>\r\n\r\n<p>comkpegowebmobile@gmail.comkpegowebmobile@gmail.</p>\r\n\r\n<p>comkpegowebmobile@gmail.comkpegowebmobile@gmail.</p>\r\n\r\n<p>comkpegowebmobile@gmail.comkpegowebmobile@gmail.</p>\r\n\r\n<p>comkpegowebmobile@gmail.comkpegowebmobile@gmail.com</p>', '02833853', 'kpegowebmobile@gmail.com', '2022-02-14 11:24:00', '2020-04-01 15:19:16', '2020-04-04 00:16:49', '5e87d1f1847b3262236937.JPG', '<p>kpegowebmobile@gmail. comkpegowebmobile@gmail</p>\r\n\r\n<p><u>.comkpegowebmobile@gmail. </u></p>\r\n\r\n<p><u>comkpegowebmobile@gmail.com</u></p>'),
(2, 'Pool party 2020', '<p>Je suis &agrave; la recherche d&#39;articles sur la communication &eacute;v&eacute;nementielle. Les angles sont multiples je pourrais en lister une partie cela dit je suis ouvert aux propositions.</p>\r\n\r\n<p>Un style d&#39;&eacute;criture conversationnel.</p>\r\n\r\n<p>Int&eacute;grer les mots clefs : &Eacute;v&eacute;nementiel - Communication &eacute;v&eacute;nementielle - agence &eacute;v&eacute;nementielle - Inauguration - team building - etc&hellip; je pourrais vous communiquer la liste.</p>\r\n\r\n<p>C&#39;est un essai avec redacteur.com si c&#39;est concluant j&#39;aurais 20 articles &agrave; &eacute;crire</p>\r\n\r\n<p>L&#39;insertion de ces articles est pr&eacute;vue dan...</p>\r\n\r\n<p>JR17-9407 a &eacute;t&eacute; choisi pour la r&eacute;daction de ce texte</p>', '02833853', 'boulaybeachresort@gmail.com', '2020-08-09 12:10:00', '2020-04-04 02:04:09', '2020-04-04 02:04:10', '5e87eb1b40706190883010.jpg', '<p>Je suis &agrave; la recherche d&#39;articles sur la communication &eacute;v&eacute;nementielle. Les angles sont multiples je pourrais en lister une partie cela dit je suis ouvert aux propositions.</p>\r\n\r\n<p><span style=\"color:#e67e22\"><strong>Un style d&#39;&eacute;criture conversationnel.</strong></span></p>'),
(3, 'Festival du Braisé et de la Friture de Yamoussoukro 2020', '<p>C&rsquo;est le plus grand &eacute;v&eacute;nement de la r&eacute;gion des Lacs, destin&eacute; &agrave; rencontrer des professionnels du secteur et &agrave; mener des affaires. Gr&acirc;ce &agrave; ses r&eacute;seaux, &agrave; sa port&eacute;e in&eacute;gal&eacute;e, le&nbsp;<strong>FESTIB&nbsp;</strong>cr&eacute;e des opportunit&eacute;s personnelles et professionnelles, offrant aux clients des contacts, du contenu et des communaut&eacute;s de qualit&eacute;. Pendant 2 jours le&nbsp;<strong>FESTIB&nbsp;</strong>r&eacute;unit les plus grands noms de brais&eacute;s et de la friture. Une occasion unique de faire un tour du monde des derni&egrave;res tendances gastronomiques.&nbsp;</p>', '(+225) 59 12 60 60', 'contact@festib.com', '2020-05-31 10:00:00', '2020-04-30 04:30:53', '2020-04-30 04:30:53', '5eaa385dd28fb362575930.png', '<p>Le&nbsp;<strong>Festival du brais&eacute; et de la Friture de Yamoussoukro (FESTIB),</strong>&nbsp;est un festival culturel qui r&eacute;unit tous les acteurs du secteur du tourisme et de la gastronomie.</p>'),
(4, 'Pool party 2021', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Donner un th&egrave;me &agrave; sa pool party. Pour donner le ton de la soir&eacute;e, n&#39;h&eacute;sitez pas &agrave; &laquo; imposer &raquo; un th&egrave;me. ...</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Pr&eacute;parer la d&eacute;coration autour de la piscine. Pour une pool party r&eacute;ussie, la d&eacute;coration autour de la piscine est essentielle.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Un &eacute;clairage fun pour votre pool party.</p>', '(+225) 59 12 60 60', 'boulaybeachresort@gmail.com', '2020-06-10 14:30:00', '2020-04-30 04:36:16', '2020-05-22 12:46:35', '5ec7ad8bab12a464230457.jpg', '<p style=\"text-align:start\">une r&eacute;ception ou une f&ecirc;te autour de la piscine. Vous pouvez &eacute;galement organiser ce genre de th&egrave;me pour une mariage ou pour un anniversaire.</p>'),
(5, 'BRUNCH FAMILY', '<p>Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6 places) 2 fauteuils de terrase 2 coupes de champagne (ou) 2 verres de wisky</p>\r\n\r\n<p>Lit king-size Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc.</p>\r\n\r\n<p>Vue sur jardin Corbeille ou plateau</p>\r\n\r\n<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique</p>\r\n\r\n<p>Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>\r\n\r\n<p>Ponton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>\r\n\r\n<p>Linge plat Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>1 Drap plat Salle de bain (douche) priv&eacute;e Table Occultation<br />\r\nPonton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>', '54001656', 'akawainnocent@gmail.com', '2020-12-01 15:00:00', '2020-04-30 13:39:36', '2020-05-22 12:52:30', '5ec7aeee30816502381568.jpg', '<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique&nbsp; &nbsp;, Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>');

-- --------------------------------------------------------

--
-- Structure de la table `event_booking`
--

CREATE TABLE `event_booking` (
  `id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `booker_id` int(11) NOT NULL,
  `started_at` datetime NOT NULL,
  `ended_at` datetime NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `event_booking`
--

INSERT INTO `event_booking` (`id`, `event_id`, `booker_id`, `started_at`, `ended_at`, `amount`) VALUES
(1, 1, 5, '2020-04-23 18:46:35', '2020-05-23 18:46:35', 0),
(2, 1, 5, '2020-04-23 19:12:08', '2020-05-23 19:12:08', 0),
(3, 1, 5, '2020-04-23 19:12:34', '2020-05-23 19:12:34', 0),
(4, 1, 5, '2020-04-23 19:13:23', '2020-05-23 19:13:23', 0),
(5, 2, 5, '2020-04-23 20:44:24', '2020-05-23 20:44:24', 0),
(6, 2, 5, '2020-04-23 21:37:22', '2020-05-23 21:37:22', 0),
(7, 2, 5, '2020-04-29 10:45:04', '2020-05-29 10:45:05', 0),
(8, 3, 5, '2020-04-30 05:10:52', '2020-05-30 05:10:52', 0),
(9, 4, 23, '2020-06-02 09:48:40', '2020-07-02 09:48:40', 0),
(10, 4, 23, '2020-06-02 09:50:22', '2020-07-02 09:50:22', 0);

-- --------------------------------------------------------

--
-- Structure de la table `event_tariff`
--

CREATE TABLE `event_tariff` (
  `event_id` int(11) NOT NULL,
  `tariff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `event_tariff`
--

INSERT INTO `event_tariff` (`event_id`, `tariff_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2),
(4, 3),
(5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `global_setting`
--

CREATE TABLE `global_setting` (
  `id` int(11) NOT NULL,
  `site_logo_id` int(11) NOT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `legend` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `room_id`, `image`, `title`, `legend`, `created_at`, `updated_at`) VALUES
(1, 1, 'enselme logo ong.jpg', 'Chambre haute', 'Chambre haute', '2020-03-26 15:25:19', '2020-03-26 15:25:20'),
(2, 1, 'Capture.PNG', 'Chambre haute', 'Chambre haute', '2020-03-26 15:25:19', '2020-03-26 15:25:20'),
(3, 2, 'backgroundimage.jpg', 'Chambre de belle nuit', 'Chambre de belle nuit', '2020-04-02 00:10:04', '2020-04-02 00:10:05'),
(4, 2, 'backgroundimage3.jpg', 'ZSFSEGDTHTYJTU', 'Chambre haute', '2020-04-02 00:10:04', '2020-04-02 00:10:05'),
(5, 3, 'backgroundimage2.jpg', 'Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', '2020-04-02 00:16:30', '2020-04-02 00:16:30'),
(6, 4, 'backgroundimage3.jpg', 'Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', '2020-04-02 00:17:38', '2020-04-02 00:17:38'),
(7, 5, 'imagesbbr.png', 'Image Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuit avec lumiere', '2020-04-22 13:45:15', '2020-04-22 13:45:19'),
(8, 6, 'EmptyTitleon12Jan20153048_YPTuniqid_5e1b59cc6a33e2.83738731.jpg', 'Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', '2020-04-22 14:23:23', '2020-04-22 14:23:24'),
(9, 6, 'flat,1000x1000,075,f.jpg', 'Chambre haute', 'Chambre haute', '2020-04-22 14:23:23', '2020-04-22 14:23:24'),
(10, 7, 'C9A2928.jpg', 'Bella Vista - 29 Boulevard Downtown Burj Khalifa', 'Bella Vista - 29 Boulevard Downtown Burj Khalifa', '2020-04-30 00:34:24', '2020-04-30 00:34:24'),
(11, 8, 'C9A3311-720x470 (1).jpg', 'Al Bandar Arjaan by Rotana – Dubai Creek', 'Al Bandar Arjaan by Rotana – Dubai Creek', '2020-04-30 00:37:02', '2020-04-30 00:37:03'),
(12, 9, 'C9A3195-scaled.jpg', 'Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', '2020-04-30 00:39:07', '2020-04-30 00:39:08'),
(14, 10, 'C9A2910-scaled.jpg', 'Chambre haute', 'Chambre haute', '2020-04-30 00:43:45', '2020-04-30 00:43:45'),
(15, 11, 'C9A2928-720x470.jpg', 'Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', '2020-04-30 01:20:04', '2020-04-30 01:20:04'),
(16, 12, '234943288.webp', 'Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', '2020-04-30 02:17:36', '2020-04-30 02:17:38'),
(17, 12, '217324850.jpg', 'Chambre haute', 'Chambre haute', '2020-04-30 02:17:36', '2020-04-30 02:17:38'),
(18, 13, '181971_18060614230066055039.jpg', 'Chambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', '2020-04-30 02:20:18', '2020-04-30 02:20:18'),
(19, 14, 'chambre-superieux.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-04-30 13:02:20', '2020-04-30 13:02:20'),
(20, 15, 'chambre2.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPÉRIEURE', '2020-04-30 15:54:36', '2020-04-30 15:54:37'),
(21, 16, 'chambre.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 10:48:17', '2020-05-13 10:48:18'),
(22, 17, 'suite1.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 10:56:04', '2020-05-13 10:56:04'),
(23, 18, 'chambre5.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 11:37:27', '2020-05-13 11:37:27'),
(24, 18, 'JACUZZI.jpg', 'JACUZZI', 'JACUZZI', '2020-05-13 11:37:27', '2020-05-13 11:37:27'),
(25, 19, 'chambre23.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 12:35:11', '2020-05-13 12:35:11'),
(26, 19, 'JACUZZI3.jpg', 'JACUZZI', 'JACUZZI', '2020-05-13 12:35:11', '2020-05-13 12:35:11'),
(27, 20, 'JACUZZI1.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 12:38:55', '2020-05-13 12:38:55'),
(28, 20, 'JACUZZI4.jpg', 'JACUZZI', 'JACUZZI', '2020-05-13 12:38:55', '2020-05-13 12:38:55'),
(29, 21, 'chambre22.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 12:48:03', '2020-05-13 12:48:03'),
(30, 21, 'JACUZZI3.jpg', 'JACUZZI', 'JACUZZI', '2020-05-13 12:48:03', '2020-05-13 12:48:03'),
(31, 22, 'JACUZI.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 12:54:26', '2020-05-13 12:54:26'),
(32, 22, 'JACUZI.jpg', 'JACUZZI', 'JACUZZI', '2020-05-13 12:54:26', '2020-05-13 12:54:26'),
(33, 23, 'chambre10.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 13:02:52', '2020-05-13 13:02:52'),
(34, 23, 'chambre10.jpg', 'JACUZZI', 'JACUZZI', '2020-05-13 13:02:52', '2020-05-13 13:02:52'),
(35, 24, 'chambre16.jpg', 'CHAMBRE SUPERIEURE', 'CHAMBRE SUPERIEURE', '2020-05-13 13:06:50', '2020-05-13 13:06:50'),
(36, 24, 'chambre16.jpg', 'JACUZZI', 'JACUZZI', '2020-05-13 13:06:50', '2020-05-13 13:06:50'),
(37, 25, 'vue-jardin.jpg', 'SUITE VUE JARDIN', 'SUITE VUE JARDIN', '2020-05-13 13:25:47', '2020-05-13 13:25:47'),
(38, 25, 'suite1.jpg', 'SUITE VUE JARDIN', 'SUITE VUE JARDIN', '2020-05-13 13:25:47', '2020-05-13 13:25:47'),
(39, 26, 'SUITE.jpg', 'SUITE VUE JARDIN', 'SUITE VUE JARDIN', '2020-05-13 13:33:44', '2020-05-13 13:33:44'),
(40, 27, 'SUIT.jpg', 'SUITE VUE JARDIN', 'SUITE VUE JARDIN', '2020-05-13 13:36:25', '2020-05-13 13:36:25'),
(41, 28, 'LAGUNE.jpg', 'SUITE VUE LAGUNE', 'SUITE VUE LAGUNE', '2020-05-13 13:45:24', '2020-05-13 13:45:24'),
(42, 29, 'LAGUNE1.jpg', 'SUITE VUE LAGUNE', 'SUITE VUE LAGUNE', '2020-05-13 13:47:47', '2020-05-13 13:47:47'),
(43, 30, 'LAGUNE2.jpg', 'SUITE VUE LAGUNE', 'SUITE VUE LAGUNE', '2020-05-13 13:50:17', '2020-05-13 13:50:18');

-- --------------------------------------------------------

--
-- Structure de la table `migration_versions`
--

CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migration_versions`
--

INSERT INTO `migration_versions` (`version`, `executed_at`) VALUES
('20200326133131', '2020-03-26 13:32:02'),
('20200327130611', '2020-03-27 13:06:25'),
('20200330122421', '2020-03-30 12:25:45'),
('20200330154853', '2020-03-30 15:49:12'),
('20200330214957', '2020-03-30 21:50:07'),
('20200330215717', '2020-03-30 21:57:25'),
('20200401133814', '2020-04-01 13:38:37'),
('20200402182902', '2020-04-06 02:22:13'),
('20200402201439', '2020-04-06 02:22:16'),
('20200404013616', '2020-04-04 01:36:43'),
('20200404033019', '2020-04-04 03:30:35'),
('20200405204409', '2020-04-06 02:22:17');

-- --------------------------------------------------------

--
-- Structure de la table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `subtitle` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `restaurant`
--

INSERT INTO `restaurant` (`id`, `title`, `price`, `subtitle`, `description`, `filename`, `created_at`, `updated_at`) VALUES
(1, 'Riz sauce graine', 2500, 'Riz sauce graine Riz sauce graineRiz sauce graine', 'Riz sauce graineRiz sauce graineRiz sauce graineRiz sauce graineRiz sauce graineRiz sauce graineRiz sauce graineRiz sauce graine\r\nRiz sauce graineRiz sauce graineRiz sauce graine', '5e7e790ce36ba216047522.jpg', '2020-03-27 22:07:08', '2020-03-27 22:07:08'),
(2, 'Riz sauce graine ave foutou', 75000, '<p>Riz sauce graine ave foutouRiz sauce graine ave foutouRiz sauce graine ave foutou</p>\r\n\r\n<p>Riz sauce graine ave foutouRiz sauce graine ave foutou</p>', '<p>Riz sauce graine ave foutouRiz sauce graine ave foutou</p>\r\n\r\n<p>Riz sauce graine ave foutouRiz sauce graine ave foutou</p>\r\n\r\n<p>Riz sauce graine ave foutouRiz sauce graine ave foutou</p>\r\n\r\n<p>Riz sauce graine ave foutouRiz sauce graine ave foutou</p>\r\n\r\n<p>vvRiz sauce graine ave foutouRiz sauce graine ave foutou</p>', '5ea0542a500be091776039.jpg', '2020-04-22 14:26:49', '2020-04-22 14:26:49'),
(3, 'Mini Burger', 10000, '<p>Pas assez faim pour un gros&nbsp;<em>burger</em>&nbsp;entier mais trop envie de profiter de la p&acirc;te moelleuse du pain ainsi que de la garniture en petite quantit&eacute;</p>', '<p>Pas assez faim pour un gros&nbsp;<em>burger</em>&nbsp;entier mais trop envie de profiter de la p&acirc;te moelleuse du pain ainsi que de la garniture en petite quantit&eacute;</p>\r\n\r\n<p>Le&nbsp;<em>Mini Burger</em>&nbsp;Classic n&#39;est pas seulement &laquo;mignon&raquo; sur le plateau, son go&ucirc;t est aussi s&eacute;duisant</p>', '5ebbe51ec0e8f272606138.jpeg', '2020-05-13 14:16:30', '2020-05-13 14:16:30'),
(4, 'Poulet Choukouya', 10000, '<p>le Choukouya,est une sorte wok de poulet cuits sur de grands barbecues</p>', '<p>Bienvenue &agrave; Abidjan(C&ocirc;te d&rsquo;ivoire),souriez et dites &laquo;Choukouya&raquo;! Je vous parie que vous ne saurez plus o&ugrave; donner de la t&ecirc;te.&nbsp;En effet, le Choukouya,est une sorte wok de poulet cuits sur de grands barbecues,vendus &agrave; presque tous les coins de rue. A l&rsquo;instar d&rsquo;un r&eacute;seau social,gr&acirc;ce aux vendeurs de choukouya,les ivoiriens se retrouvent nombreux autour d&rsquo;une bonne bouf</p>', '5ebbe783c8d22302828750.jpg', '2020-05-13 14:26:43', '2020-05-13 14:26:43'),
(5, 'Fajitas à la viande', 10000, '<p>Une&nbsp;<em>fajita</em>&nbsp;est un mets de cuisine tex-mex constitu&eacute; d&#39;une tortilla g&eacute;n&eacute;ralement&nbsp;de&nbsp;<em>viande</em>&nbsp;de b&oelig;uf,&nbsp;farine de ma&iuml;s pli&eacute;e.</p>', '<p>La&nbsp;<em>viande</em>.&nbsp;<em>Fajitas</em>, en espagnol, &ccedil;a veut dire &laquo; petites bandes &raquo;, &laquo; bandelettes &raquo;, ou &laquo; petites jupes &raquo;</p>\r\n\r\n<p>Une&nbsp;<em>fajita</em>&nbsp;est un mets de cuisine tex-mex constitu&eacute; d&#39;une tortilla g&eacute;n&eacute;ralement&nbsp;de&nbsp;<em>viande</em>&nbsp;de b&oelig;uf,&nbsp;farine de ma&iuml;s pli&eacute;e.</p>', '5ebbe9505a896078630128.jpg', '2020-05-13 14:34:24', '2020-05-13 14:34:24'),
(6, 'Mini brochettes de poulet', 10000, '<p>piquer les d&eacute;s de&nbsp;<em>poulet</em>&nbsp;sur des minis&nbsp;<em>brochettes</em></p>', '<p>Apr&egrave;s mac&eacute;ration, piquer les d&eacute;s de&nbsp;<em>poulet</em>&nbsp;sur des minis&nbsp;<em>brochettes</em>&nbsp;en bois en ajoutant &eacute;ventuellement des morceaux d&#39;orange ou de citron</p>', '5ebbeb422377d263846966.jpeg', '2020-05-13 14:42:42', '2020-05-13 14:42:42'),
(7, 'Mini brochettes de boeuf', 10000, '<p>&nbsp;<em>brochettes de b&oelig;uf</em>&nbsp;absolument d&eacute;licieuses</p>', '<p>&nbsp;Ces petites&nbsp;<em>brochettes de b&oelig;uf</em>&nbsp;absolument d&eacute;licieuses et d&#39;inspiration asiatique peuvent aussi &ecirc;tre pr&eacute;par&eacute;es avec du poulet</p>', '5ebbec721fd6a169504699.jpg', '2020-05-13 14:47:46', '2020-05-13 14:47:46'),
(8, 'Frites de pomme de terre (accompagnement)', 0, '<p>&nbsp;<em>frites</em>&nbsp;plus l&eacute;g&egrave;res et plus croustillantes.</p>', '<p>Elle cuit plus rapidement, absorbe moins de gras et donne des&nbsp;<em>frites</em>&nbsp;plus l&eacute;g&egrave;res et plus croustillantes. Les&nbsp;<em>pommes de terre</em>&nbsp;contenant un faible taux d&#39;amidon&nbsp;.</p>', '5ebbef2e9590b338639589.jpg', '2020-05-13 14:59:26', '2020-05-13 14:59:26'),
(9, 'Frites d’igname ( accompagnement )', 0, '<p>&nbsp;<em>frites</em>&nbsp;avec un minimum de mati&egrave;re grasse</p>', '<p>Des&nbsp;<em>frites</em>&nbsp;avec un minimum de mati&egrave;re grasse, c&#39;est possible avec les&nbsp;<em>frites d&#39;</em><em>igname</em>&nbsp;au four de Tatie Maryse! De la cr&eacute;ativit&eacute; dans la cuisine&nbsp;..</p>', '5ebbf03ea1bc7773249046.jpg', '2020-05-13 15:03:58', '2020-05-13 15:03:58'),
(10, 'Potatoes Spicy ( accompagnement )', 0, '<p>des &eacute;pices et surtout pas trop grasses</p>', '<p>&nbsp;<em>Spicy Potatoes</em>&nbsp;&nbsp;Les&nbsp;<em>potatoes</em>&nbsp;nous on aime,&nbsp;avec des &eacute;pices et surtout pas trop grasses</p>', '5ebbf22b72143819953529.jpg', '2020-05-13 15:12:11', '2020-05-13 15:12:11'),
(11, 'Potatoes Sweet ( accompagnement )', 0, '<p>elles sont &nbsp;extr&ecirc;mement int&eacute;ressantes</p>', '<p>elles sont &nbsp;extr&ecirc;mement int&eacute;ressantes pour les personnes qui suivent un r&eacute;gime amaigrissant, car leur apport &eacute;nerg&eacute;tique est r&eacute;gulier, et elles sont &eacute;galement pauvres en sucre et en graisses.</p>', '5ebbf44953139000709049.jpg', '2020-05-13 15:21:13', '2020-05-13 15:21:13'),
(12, 'Brochettes de banane plantain ( accompagnement )', 0, '<p>elle contribueraient &agrave; maintenir une bonne sant&eacute; gastro-intestinale.</p>', '<p>Riche en antioxydants, la&nbsp;<strong>banane</strong>&nbsp;pr&eacute;viendrait l&#39;apparition de nombreuses maladies. De plus, les sucres qu&#39;elle contient contribueraient &agrave; maintenir une bonne sant&eacute; gastro-intestinale.</p>', '5ebbf5d5d3fc2295332315.jpg', '2020-05-13 15:27:49', '2020-05-13 15:27:49');

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'ROLE_USER'),
(2, 'ROLE_SUPER_ADMIN');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `main_image_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week_price` int(11) NOT NULL,
  `weekend_price` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `guest_place_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `room`
--

INSERT INTO `room` (`id`, `main_image_id`, `title`, `description`, `summary`, `week_price`, `weekend_price`, `published`, `created_at`, `updated_at`, `guest_place_count`) VALUES
(1, 1, 'Chambre haute', 'Chambre hauteChambre hauteChambre hauteChambre haute', 'Chambre hauteChambre haute', 80000, 800000, 1, '2020-03-26 15:25:19', NULL, 4),
(2, 3, 'Chambre de belle nuit', 'Chambre de belle nuit\r\nChambre de belle nuit Chambre de belle nuit Chambre de belle nuit', 'Chambre de belle nuit Chambre de belle nuit', 90000, 120000, 1, '2020-04-02 00:10:04', NULL, 2),
(3, 5, 'Chambre de belle soirée', 'Chambre de belle nuitChambre de belle nuit\r\nChambre de belle nuitvvChambre de belle nuit\r\nChambre de belle nuitChambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', 522000, 1445588, 1, '2020-04-02 00:16:30', NULL, 2),
(4, 6, 'Chambre de belle nuit hfyr', 'Chambre de belle nuit Chambre de belle nuit', 'Chambre de belle nuitChambre de belle nuit', 5488889, 5558887, 1, '2020-04-02 00:17:38', NULL, 3),
(5, 7, 'Chambre de belle nuit avec lumiere', '<p>Chambre de belle nuit avec lumiere</p>\r\n\r\n<p>Chambre de belle nuit avec lumiere</p>\r\n\r\n<p>Chambre de belle nuit avec lumiereChambre de belle nuit avec lumiere</p>\r\n\r\n<p>Chambre de belle nuit avec lumiere</p>', '<p><span style=\"color:#2980b9\">Chambre de belle nuit avec lumiere</span></p>\r\n\r\n<p>Chambre de belle nuit avec lumiere</p>\r\n\r\n<p>Chambre de belle nuit avec lumiere</p>\r\n\r\n<p>Chambre de belle nuit avec lumiere</p>', 522000, 854000, 1, '2020-04-22 13:45:14', NULL, 6),
(6, 8, 'Enregistrer une nouvelle chambre', '<h1>Enregistrer une nouvelle chambre&nbsp;Enregistrer une nouvelle chambre</h1>\r\n\r\n<h1>Enregistrer une nouvelle chambre</h1>\r\n\r\n<h1>Enregistrer une nouvelle chambre</h1>', '<h1>Enregistrer une nouvelle chambre</h1>\r\n\r\n<h1>Enregistrer une nouvelle chambre</h1>\r\n\r\n<h1>Enregistrer une nouvelle chambre</h1>', 120000, 250000, 1, '2020-04-22 14:23:23', NULL, 5),
(7, 10, 'Bella Vista - 29 Boulevard Downtown Burj Khalifa', '<p>Situ&eacute; &agrave; 1,3 km de la tour Burj Khalifa, le Bella Vista -</p>\r\n\r\n<p>29 Boulevard Downtown Burj Khalifa propose une piscine ext&eacute;rieure,</p>\r\n\r\n<p>une salle de sport et une r&eacute;ception ouverte 24h/24.</p>', '<p>Situ&eacute; &agrave; 1,3 km de la tour Burj Khalifa, le Bella Vista</p>', 155000, 230000, 1, '2020-04-30 00:34:24', NULL, 3),
(8, 11, 'Al Bandar Arjaan by Rotana – Dubai Creek', '<p>L&#39;Al Bandar Arjaan by Rotana est un remarquable complexe h&ocirc;telier ultramoderne proposant des appartements et b&eacute;n&eacute;ficiant d&#39;un emplacement privil&eacute;gi&eacute; au bord de l&#39;eau, sur la rive nord du bras de mer...</p>\r\n\r\n<p>L&#39;Al Bandar Arjaan by Rotana est un remarquable complexe h&ocirc;telier ultramoderne proposant des appartements et b&eacute;n&eacute;ficiant d&#39;un emplacement privil&eacute;gi&eacute; au bord de l&#39;eau, sur la rive nord du bras de mer...</p>', '<p>L&#39;Al Bandar Arjaan by Rotana est un remarquable complexe h&ocirc;telier ultramoderne proposant des appartements et b&eacute;n&eacute;ficiant d&#39;un emplacement privil&eacute;gi&eacute; au bord de l&#39;eau, sur la rive nord du bras de mer...</p>', 180000, 220000, 1, '2020-04-30 00:37:02', NULL, 2),
(9, 12, 'Leman Locke Whitechapel, Londres', '<p>Dot&eacute; d&#39;h&eacute;bergements &eacute;l&eacute;gants avec connexion Wi-Fi gratuite, le Leman Locke se situe dans le quartier de Shoreditch &agrave; Londres, &agrave; 900 m&egrave;tres de la tour de Londres et de la rue Brick Lane.</p>\r\n\r\n<p>Dot&eacute; d&#39;h&eacute;bergements &eacute;l&eacute;gants avec connexion Wi-Fi gratuite, le Leman Locke se situe dans le quartier de Shoreditch &agrave; Londres, &agrave; 900 m&egrave;tres de la tour de Londres et de la rue Brick Lane.</p>\r\n\r\n<p>Dot&eacute; d&#39;h&eacute;bergements &eacute;l&eacute;gants avec connexion Wi-Fi gratuite, le Leman Locke se situe dans le quartier de Shoreditch &agrave; Londres, &agrave; 900 m&egrave;tres de la tour de Londres et de la rue Brick Lane.</p>', '<p>Dot&eacute; d&#39;h&eacute;bergements &eacute;l&eacute;gants avec connexion Wi-Fi gratuite, le Leman Locke se situe dans le quartier de Shoreditch &agrave; Londres, &agrave; 900 m&egrave;tres de la tour de Londres et de la rue Brick Lane.</p>', 155000, 230000, 1, '2020-04-30 00:39:07', NULL, 2),
(11, 15, 'Executive Living Old Town Unique', '<p>Install&eacute; dans un b&acirc;timent du XVII&egrave;me si&egrave;cle dans la vieille ville de Stockholm, les appartements Executive Living Old Town Unique comprennent une connexion Wi-Fi gratuite et une cuisine bien &eacute;quip&eacute;e.</p>\r\n\r\n<p>Install&eacute; dans un b&acirc;timent du XVII&egrave;me si&egrave;cle dans la vieille ville de Stockholm, les appartements Executive Living Old Town Unique comprennent une connexion Wi-Fi gratuite et une cuisine bien &eacute;quip&eacute;e.</p>', '<p>Install&eacute; dans un b&acirc;timent du XVII&egrave;me si&egrave;cle dans la vieille ville de Stockholm, les appartements Executive Living Old Town Unique comprennent une connexion Wi-Fi gratuite et une cuisine bien &eacute;quip&eacute;e.</p>\r\n\r\n<p>I', 155000, 230000, 1, '2020-04-30 01:20:04', NULL, 2),
(12, 16, 'Marco Polo Motor Inn - Sydney', '<p>Profitez d&#39;une multiplicit&eacute; de services et d&#39;&eacute;quipements incomparables dans cet &eacute;tablissement de Sydney. Les clients de cet &eacute;tablissement peuvent profiter d&#39;&eacute;quipements tels que WiFi gratuit dans toutes les chambres, m&eacute;nage quotidien, service de taxi, service postal, sup&eacute;rette.<br />\r\n<br />\r\nL&#39;atmosph&egrave;re du Marco Polo Motor Inn se retrouve dans toutes les chambres, et internet sans fil (gratuit), chambres non-fumeurs, climatisation, t&eacute;l&eacute;phone, films &agrave; la demande ne sont que quelques-uns des &eacute;quipements disponibles &agrave; travers l&#39;&eacute;tablissement. Gr&acirc;ce au vaste &eacute;ventail de loisirs propos&eacute; par l&#39;h&ocirc;tel, les h&ocirc;tes ne manqueront pas d&#39;activit&eacute;s durant leur s&eacute;jour. Le Marco Polo Motor Inn est un incontournable pour ceux qui cherchent un h&ocirc;tel de qualit&eacute; &agrave; Sydney.</p>', '<p>Durant votre s&eacute;jour &agrave; Sydney, vous vous sentirez parfaitement bien au Marco Polo Motor Inn, dont les chambres et le service sont d&#39;une qualit&eacute; hors pair. L&#39;animation du centre-ville se trouve &agrave; seulement 9 km de l&#3', 155000, 280000, 1, '2020-04-30 02:17:35', NULL, 4),
(13, 18, 'Sydney Hotel CBD', '<p>Les &eacute;quipements et les services propos&eacute;s par le&nbsp;<strong>Sydney Hotel CBD</strong>&nbsp;sont la garantie pour les clients d&#39;un plaisant s&eacute;jour. L&#39;h&ocirc;tel donne acc&egrave;s &agrave; un vaste &eacute;ventail de services, dont m&eacute;nage quotidien, service de taxi, accessible en fauteuil roulant, accessible aux personnes handicap&eacute;es, check-in/-out express.<br />\r\n<br />\r\nL&#39;atmosph&egrave;re du&nbsp;<strong>Sydney Hotel CBD</strong>&nbsp;se retrouve dans toutes les chambres. placard, th&eacute; gratuit, serviettes de toilette, moquette, chaussons ne sont que quelques-uns des &eacute;quipements disponibles &agrave; travers l&#39;&eacute;tablissement. En outre, gr&acirc;ce au vaste &eacute;ventail de loisirs propos&eacute; par l&#39;h&ocirc;tel, vous ne manquerez pas d&#39;activit&eacute;s pendant votre s&eacute;jour. D&eacute;couvrez le superbe mariage entre un service impeccable et une belle gamme d&#39;&eacute;quipements au&nbsp;<strong>Sydney Hotel CBD</strong></p>', '<p>Construit en 2015,&nbsp;<strong>Sydney Hotel CBD</strong>&nbsp;est non seulement un excellent choix pour les voyageurs mais aussi un &eacute;tablissement de Sydney qui sort de l&#39;ordinaire. Le centre-ville est &agrave; seulement 0 km et aller &agrav', 180000, 310000, 1, '2020-04-30 02:20:17', NULL, 2),
(14, 19, 'CHAMBRE SUPERIEURE N°1', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>', 160000, 200000, 1, '2020-04-30 13:02:20', NULL, 2),
(15, 20, 'CHAMBRE SUPERIEURE N°2', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>', 160000, 200000, 1, '2020-04-30 15:54:36', NULL, 2),
(16, 21, 'CHAMBRE SUPERIEURE N°3', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette p', 160000, 200000, 1, '2020-05-13 10:48:17', NULL, 2),
(17, 22, 'CHAMBRE SUPERIEURE N°4', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette p', 160000, 200000, 1, '2020-05-13 10:56:04', NULL, 2),
(18, 23, 'CHAMBRE SUPERIEURE N°5', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>', 160000, 200000, 1, '2020-05-13 11:37:27', NULL, 2),
(19, 25, 'CHAMBRE SUPERIEURE N°6', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette p', 160000, 200000, 1, '2020-05-13 12:35:11', NULL, 2),
(20, 27, 'CHAMBRE SUPERIEURE N°7', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette p', 160000, 200000, 1, '2020-05-13 12:38:55', NULL, 2),
(21, 29, 'CHAMBRE SUPERIEURE N°8', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette p', 160000, 200000, 1, '2020-05-13 12:48:03', NULL, 2),
(22, 31, 'CHAMBRE SUPERIEURE N°9', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>', 160000, 200000, 1, '2020-05-13 12:54:26', NULL, 2),
(23, 33, 'CHAMBRE SUPERIEURE N°10', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette p', 160000, 200000, 1, '2020-05-13 13:02:52', NULL, 2),
(24, 35, 'CHAMBRE SUPERIEURE N°11', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge plat Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>1 Drap plat 2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>1 Housse de couette 2 Serviettes essuie mains Corbeille ou plateau Rangements : penderie - armoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Taies carr&eacute;es 2 Draps de bain Bouilloire &eacute;lectrique Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Taies rectangulaires 2 Peignoirs de bain Verre &agrave; eau - Tasse &agrave; caf&eacute; Coffre-fort individuel 2 Chaussons ferm&eacute;s Minibar (contenu &agrave; pr&eacute;ciser) Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction 1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1 peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>Budget Offert :10000 FCFA</p>\r\n\r\n<p>noix cajou 50g brande bbr, chocolat brande bbr medaillon;chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette p', 160000, 200000, 1, '2020-05-13 13:06:50', NULL, 2),
(25, 37, 'SUITE VUE JARDIN', '<p>Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6 places) 2 fauteuils de terrase 2 coupes de champagne (ou) 2 verres de wisky</p>\r\n\r\n<p>Lit king-size Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc.</p>\r\n\r\n<p>Vue sur jardin Corbeille ou plateau</p>\r\n\r\n<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique</p>\r\n\r\n<p>Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>\r\n\r\n<p>Ponton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>\r\n\r\n<p>Linge plat Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>1 Drap plat Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>1 Housse de couette Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>2 Taies carr&eacute;es Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>2 Taies rectangulaires 11m&sup2; Bloc note - Sylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar</p>\r\n\r\n<p>T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>2 Serviettes essuie mains Rangements : penderie - amoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Draps de bain Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Peignoirs de bain Minibar (contenu &agrave; pr&eacute;ciser) Coffre-fort individuel</p>\r\n\r\n<p>2 Chaussons ferm&eacute;s Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction<br />\r\n&nbsp;<br />\r\n1 shamppoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1&nbsp;&nbsp; &nbsp;peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.) Autres : corbeille ou plateau - bouilloire &eacute;lectrique - verre &agrave; eau - tasse &agrave; caf&eacute; - etc.</p>\r\n\r\n<p>Tarif pour 1 nuit&eacute;e + Petit d&eacute;jeuner buffet S&eacute;jour secondaire : 1 canap&eacute; classique (2 ou 3 places) + 1 fauteuil</p>\r\n\r\n<p>kitchenette comprenant : Micro-onde - R&eacute;frig&eacute;rateur - Vaisselles et couverts - Etc.</p>\r\n\r\n<p>BUDGET OFFERT champagne LP Brut pu demi sec(biscuit, noix cajou 50g brande bbr , chocolat brande bbr m&eacute;daillon; chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6', 250000, 300000, 1, '2020-05-13 13:25:47', NULL, 2),
(26, 39, 'SUITE VUE JARDIN2', '<p>Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6 places) 2 fauteuils de terrase 2 coupes de champagne (ou) 2 verres de wisky</p>\r\n\r\n<p>Lit king-size Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc.</p>\r\n\r\n<p>Vue sur jardin Corbeille ou plateau</p>\r\n\r\n<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique</p>\r\n\r\n<p>Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>\r\n\r\n<p>Ponton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>\r\n\r\n<p>Linge plat Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>1 Drap plat Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>1 Housse de couette Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>2 Taies carr&eacute;es Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>2 Taies rectangulaires 11m&sup2; Bloc note - Sylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar</p>\r\n\r\n<p>T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>2 Serviettes essuie mains Rangements : penderie - amoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Draps de bain Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Peignoirs de bain Minibar (contenu &agrave; pr&eacute;ciser) Coffre-fort individuel</p>\r\n\r\n<p>2 Chaussons ferm&eacute;s Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction<br />\r\n&nbsp;<br />\r\n1 shamppoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1&nbsp;&nbsp; &nbsp;peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.) Autres : corbeille ou plateau - bouilloire &eacute;lectrique - verre &agrave; eau - tasse &agrave; caf&eacute; - etc.</p>\r\n\r\n<p>Tarif pour 1 nuit&eacute;e + Petit d&eacute;jeuner buffet S&eacute;jour secondaire : 1 canap&eacute; classique (2 ou 3 places) + 1 fauteuil</p>\r\n\r\n<p>kitchenette comprenant : Micro-onde - R&eacute;frig&eacute;rateur - Vaisselles et couverts - Etc.</p>\r\n\r\n<p>BUDGET OFFERT champagne LP Brut pu demi sec(biscuit, noix cajou 50g brande bbr , chocolat brande bbr m&eacute;daillon; chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6', 250000, 300000, 1, '2020-05-13 13:33:44', NULL, 2),
(27, 40, 'SUITE VUE JARDIN3', '<p>Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6 places) 2 fauteuils de terrase 2 coupes de champagne (ou) 2 verres de wisky</p>\r\n\r\n<p>Lit king-size Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc.</p>\r\n\r\n<p>Vue sur jardin Corbeille ou plateau</p>\r\n\r\n<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique</p>\r\n\r\n<p>Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>\r\n\r\n<p>Ponton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>\r\n\r\n<p>Linge plat Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>1 Drap plat Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>1 Housse de couette Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>2 Taies carr&eacute;es Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>2 Taies rectangulaires 11m&sup2; Bloc note - Sylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar</p>\r\n\r\n<p>T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>2 Serviettes essuie mains Rangements : penderie - amoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Draps de bain Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Peignoirs de bain Minibar (contenu &agrave; pr&eacute;ciser) Coffre-fort individuel</p>\r\n\r\n<p>2 Chaussons ferm&eacute;s Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction<br />\r\n&nbsp;<br />\r\n1 shamppoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1&nbsp;&nbsp; &nbsp;peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.) Autres : corbeille ou plateau - bouilloire &eacute;lectrique - verre &agrave; eau - tasse &agrave; caf&eacute; - etc.</p>\r\n\r\n<p>Tarif pour 1 nuit&eacute;e + Petit d&eacute;jeuner buffet S&eacute;jour secondaire : 1 canap&eacute; classique (2 ou 3 places) + 1 fauteuil</p>\r\n\r\n<p>kitchenette comprenant : Micro-onde - R&eacute;frig&eacute;rateur - Vaisselles et couverts - Etc.</p>\r\n\r\n<p>BUDGET OFFERT champagne LP Brut pu demi sec(biscuit, noix cajou 50g brande bbr , chocolat brande bbr m&eacute;daillon; chips banane 100g, cristalline,4 capsule caf&eacute; dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6', 250000, 300000, 1, '2020-05-13 13:36:25', NULL, 2),
(28, 41, 'SUITE VUE LAGUNE', '<p>Chambre Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6 places) 2 fauteuils de terrase 2 coupes de champagne (ou) 2 verres de wisky</p>\r\n\r\n<p>Lit king-size 1 canap&eacute; de terrasse Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc.</p>\r\n\r\n<p>Vue sur jardin Corbeille ou plateau</p>\r\n\r\n<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique</p>\r\n\r\n<p>Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>\r\n\r\n<p>Ponton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>\r\n\r\n<p>Linge plat Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>1 Drap plat Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>1 Housse de couette Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>2 Taies carr&eacute;es Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>2 Taies rectangulaires 11m&sup2; Bloc note - Sylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar</p>\r\n\r\n<p>T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>2 Serviettes essuie mains Rangements : penderie - amoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Draps de bain Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Peignoirs de bain Minibar (contenu &agrave; pr&eacute;ciser) Coffre-fort individuel</p>\r\n\r\n<p>2 Chaussons ferm&eacute;s Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction<br />\r\n&nbsp;<br />\r\n1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1&nbsp;&nbsp; &nbsp;peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>S&eacute;jour secondaire : 1 canap&eacute; classique (3 ou 4 places) + 1 fauteuil</p>\r\n\r\n<p>kitchenette comprenant : Micro-onde - R&eacute;frig&eacute;rateur - Vaiselles et couverts - Etc. Autres : corbeille ou plateau - bouilloire &eacute;lectrique - verre &agrave; eau - tasse &agrave; caf&eacute; - etc. Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>BUDGET OFFERT : champagne LP Brut pu demi sec(biscuit, noix cajou 50g brande bbr , chocolat brande bbr coffret 200g; chips banane 100g, cristalline,4 capsule cafe dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Chambre Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; m', 350000, 400000, 1, '2020-05-13 13:45:24', NULL, 2);
INSERT INTO `room` (`id`, `main_image_id`, `title`, `description`, `summary`, `week_price`, `weekend_price`, `published`, `created_at`, `updated_at`, `guest_place_count`) VALUES
(29, 42, 'SUITE VUE LAGUNE2', '<p>Chambre Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6 places) 2 fauteuils de terrase 2 coupes de champagne (ou) 2 verres de wisky</p>\r\n\r\n<p>Lit king-size 1 canap&eacute; de terrasse Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc.</p>\r\n\r\n<p>Vue sur jardin Corbeille ou plateau</p>\r\n\r\n<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique</p>\r\n\r\n<p>Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>\r\n\r\n<p>Ponton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>\r\n\r\n<p>Linge plat Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>1 Drap plat Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>1 Housse de couette Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>2 Taies carr&eacute;es Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>2 Taies rectangulaires 11m&sup2; Bloc note - Sylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar</p>\r\n\r\n<p>T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>2 Serviettes essuie mains Rangements : penderie - amoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Draps de bain Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Peignoirs de bain Minibar (contenu &agrave; pr&eacute;ciser) Coffre-fort individuel</p>\r\n\r\n<p>2 Chaussons ferm&eacute;s Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction<br />\r\n&nbsp;<br />\r\n1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1&nbsp;&nbsp; &nbsp;peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>S&eacute;jour secondaire : 1 canap&eacute; classique (3 ou 4 places) + 1 fauteuil</p>\r\n\r\n<p>kitchenette comprenant : Micro-onde - R&eacute;frig&eacute;rateur - Vaiselles et couverts - Etc. Autres : corbeille ou plateau - bouilloire &eacute;lectrique - verre &agrave; eau - tasse &agrave; caf&eacute; - etc. Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>BUDGET OFFERT : champagne LP Brut pu demi sec(biscuit, noix cajou 50g brande bbr , chocolat brande bbr coffret 200g; chips banane 100g, cristalline,4 capsule cafe dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Chambre Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; m', 350000, 400000, 1, '2020-05-13 13:47:47', NULL, 2),
(30, 43, 'SUITE VUE LAGUNE 3', '<p>Chambre Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; manger (6 places) 2 fauteuils de terrase 2 coupes de champagne (ou) 2 verres de wisky</p>\r\n\r\n<p>Lit king-size 1 canap&eacute; de terrasse Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc.</p>\r\n\r\n<p>Vue sur jardin Corbeille ou plateau</p>\r\n\r\n<p>Toilette visiteurs Jardin et plage priv&eacute;s Bouilloire &eacute;lectrique</p>\r\n\r\n<p>Jardin (13m&sup2;) Verre &agrave; eau - Tasse &agrave; caf&eacute;</p>\r\n\r\n<p>Ponton priv&eacute; Minibar (contenu &agrave; pr&eacute;ciser)</p>\r\n\r\n<p>Linge plat Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>1 Drap plat Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>1 Housse de couette Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>2 Taies carr&eacute;es Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>2 Taies rectangulaires 11m&sup2; Bloc note - Sylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)</p>\r\n\r\n<p>R&eacute;frig&eacute;rateur et Mini bar</p>\r\n\r\n<p>T&eacute;l&eacute;phone fixe direct</p>\r\n\r\n<p>Linge &eacute;ponge Plateau d&#39;accueil Lampe de chevet</p>\r\n\r\n<p>2 Eponges carr&eacute;es Eau min&eacute;rale - th&eacute; - caf&eacute; - biscuits - fruits - etc. Internet/Wifi gratuit</p>\r\n\r\n<p>2 Serviettes essuie mains Rangements : penderie - amoires - &eacute;tag&egrave;res - etc.</p>\r\n\r\n<p>2 Draps de bain Corbeille &agrave; papier (chambre et salle de bain)</p>\r\n\r\n<p>2 Peignoirs de bain Minibar (contenu &agrave; pr&eacute;ciser) Coffre-fort individuel</p>\r\n\r\n<p>2 Chaussons ferm&eacute;s Porte valise</p>\r\n\r\n<p>1 Tapis de bain Fer &agrave; repasser (&agrave; demande)</p>\r\n\r\n<p>Articles de toilette D&eacute;pliants et supports d&#39;informations Divertissement 1 bonnet de bain Acc&egrave;s la piscine</p>\r\n\r\n<p>1 savon de bain solide 1 transat r&eacute;serv&eacute;</p>\r\n\r\n<p>1 savon liquide Courrier ou mot de bienvenue de la direction<br />\r\n&nbsp;<br />\r\n1 shampoing Carte room service</p>\r\n\r\n<p>1 lait de corps Carte num&eacute;ro utiles</p>\r\n\r\n<p>1&nbsp;&nbsp; &nbsp;peigne Papier toilette S&egrave;che-cheveux</p>\r\n\r\n<p>S&eacute;jour secondaire : 1 canap&eacute; classique (3 ou 4 places) + 1 fauteuil</p>\r\n\r\n<p>kitchenette comprenant : Micro-onde - R&eacute;frig&eacute;rateur - Vaiselles et couverts - Etc. Autres : corbeille ou plateau - bouilloire &eacute;lectrique - verre &agrave; eau - tasse &agrave; caf&eacute; - etc. Support de table pour d&eacute;pliants et fiches d&#39;informations (room service, informations, etc.)</p>\r\n\r\n<p>BUDGET OFFERT : champagne LP Brut pu demi sec(biscuit, noix cajou 50g brande bbr , chocolat brande bbr coffret 200g; chips banane 100g, cristalline,4 capsule cafe dont 2 deca</p>\r\n\r\n<p>NB: PISCINE GRATUITE</p>', '<p>Chambre Double s&eacute;jour Terrasse et jacuzzi priv&eacute;s Acceuil personnalis&eacute; Chambre double 48m&sup2; Terrase (20m&sup2;) Ma&icirc;tre d&#39;h&ocirc;tel d&eacute;di&eacute;</p>\r\n\r\n<p>19m&sup2; S&eacute;jour principale : 1 table &agrave; m', 350000, 400000, 1, '2020-05-13 13:50:17', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `room_booking`
--

CREATE TABLE `room_booking` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `booker_id` int(11) NOT NULL,
  `started_at` datetime NOT NULL,
  `ended_at` datetime NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `room_booking`
--

INSERT INTO `room_booking` (`id`, `room_id`, `booker_id`, `started_at`, `ended_at`, `amount`) VALUES
(3, 1, 5, '2020-04-19 17:51:54', '2020-04-20 17:51:54', 160000),
(4, 1, 5, '2020-04-26 18:00:45', '2020-04-27 18:00:45', 880000),
(5, 1, 5, '2020-06-01 18:02:04', '2020-06-30 18:02:04', 8160000),
(6, 3, 5, '2020-04-23 16:12:39', '2020-04-25 16:12:39', 2489588),
(7, 3, 5, '2020-04-30 17:24:41', '2020-04-27 17:24:41', 3935176),
(8, 3, 5, '2020-05-01 18:53:06', '2020-05-01 18:53:06', 522000),
(9, 3, 5, '2020-05-02 18:58:12', '2020-05-03 18:58:12', 2891176),
(10, 3, 5, '2020-05-13 19:07:42', '2020-05-14 19:07:42', 1044000),
(11, 3, 5, '2020-05-21 19:08:45', '2020-05-22 19:08:45', 1044000),
(12, 3, 5, '2020-06-12 19:10:14', '2020-05-29 19:10:14', 11524352),
(13, 3, 5, '2020-06-17 19:26:14', '2020-07-23 19:26:14', 28549880),
(14, 1, 5, '2020-07-17 19:36:16', '2020-08-08 19:36:16', 6880000),
(15, 3, 5, '2020-09-11 19:39:36', '2020-11-06 19:39:36', 44531408),
(16, 6, 5, '2020-06-05 20:38:45', '2020-08-06 20:38:45', 9900000),
(17, 1, 5, '2020-10-24 10:26:14', '2020-11-28 10:26:14', 10800000),
(18, 14, 21, '2020-05-06 13:14:33', '2020-05-10 13:14:33', 880000),
(19, 15, 21, '2020-05-01 17:35:20', '2020-05-04 17:35:20', 720000),
(20, 23, 5, '2020-05-29 12:39:52', '2020-06-01 12:39:52', 720000),
(21, 30, 17, '2020-05-29 15:18:26', '2020-06-01 15:18:26', 1500000),
(22, 29, 5, '2020-06-23 17:13:01', '2020-06-26 17:13:01', 1400000),
(23, 29, 5, '2020-05-25 17:52:12', '2020-05-26 17:52:12', 700000),
(24, 25, 5, '2020-05-26 17:55:29', '2020-05-27 17:55:29', 500000),
(25, 25, 5, '2020-05-28 23:43:33', '2020-05-29 23:43:33', 500000),
(26, 27, 5, '2020-05-26 15:08:37', '2020-05-27 15:08:37', 500000),
(27, 27, 5, '2020-05-28 17:22:24', '2020-05-29 17:22:24', 500000),
(28, 27, 5, '2020-05-30 17:59:09', '2020-05-31 17:59:09', 600000),
(29, 27, 5, '2020-06-01 18:00:56', '2020-06-02 18:00:56', 500000),
(30, 27, 5, '2020-06-04 18:03:39', '2020-06-05 18:03:39', 500000),
(31, 27, 5, '2020-06-07 18:08:57', '2020-06-08 18:08:57', 550000),
(32, 27, 5, '2020-06-09 18:21:44', '2020-06-10 18:21:44', 500000),
(33, 27, 5, '2020-06-18 18:46:26', '2020-06-24 18:46:26', 1850000),
(34, 29, 5, '2020-05-28 16:35:47', '2020-05-29 16:35:47', 700000),
(35, 28, 5, '2020-05-28 23:54:28', '2020-05-29 23:54:28', 700000),
(36, 28, 5, '2020-08-01 01:39:59', '2020-08-02 01:39:59', 800000),
(37, 28, 5, '2020-08-04 01:54:19', '2020-08-05 01:54:19', 700000),
(38, 23, 5, '2020-06-04 00:44:09', '2020-06-05 00:44:09', 320000),
(39, 30, 5, '2020-06-05 16:42:29', '2020-06-06 16:42:29', 750000),
(40, 30, 23, '2020-06-26 16:02:28', '2020-06-30 16:02:28', 1850000),
(41, 22, 5, '2020-06-05 17:03:10', '2020-06-07 17:03:10', 560000),
(42, 26, 21, '2020-06-15 14:04:10', '2020-06-14 14:04:10', 500000),
(43, 15, 21, '2020-06-18 14:25:24', '2020-06-20 14:25:24', 520000),
(44, 30, 17, '2020-06-10 14:33:26', '2020-06-25 14:33:26', 5450000),
(45, 25, 5, '2020-06-12 14:43:40', '2020-06-13 14:43:40', 250000);

-- --------------------------------------------------------

--
-- Structure de la table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `room_category`
--

INSERT INTO `room_category` (`id`, `title`, `description`) VALUES
(1, 'Appt en bordu d\'eau', 'blblblblbllblbb'),
(2, 'CHAMBRE SUPERIEURE', '<p>Chambre Salle de bain Bureau Commodit&eacute;s</p>\r\n\r\n<p>Chambre double Salle de bain (douche) priv&eacute;e Table Occultation</p>\r\n\r\n<p>28m&sup2; Lavabo (douche) Chaise Carte d&rsquo;acc&egrave;s &agrave; la chambre</p>\r\n\r\n<p>Lit queen-size Toilette priv&eacute;e Lampe de bureau Climatisation</p>\r\n\r\n<p>Vue sur jardin 11m&sup2; Bloc note - Stylo - Bo&icirc;te de mouchoirs jetables T&eacute;l&eacute;vision 49 pouces (cha&icirc;nes satellite)<br />\r\n&nbsp;</p>');

-- --------------------------------------------------------

--
-- Structure de la table `room_equipment`
--

CREATE TABLE `room_equipment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `room_equipment`
--

INSERT INTO `room_equipment` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Chauffe eau', 'fire', '2020-03-26 15:16:47', NULL),
(3, 'Télévision écran plasma 49P', 'television', '2020-04-30 00:20:23', NULL),
(4, 'Un Jacuzzi', 'bathtub', '2020-04-30 00:23:04', NULL),
(5, 'lit', 'bed', '2020-04-30 12:47:14', NULL),
(6, 'connexion wifi', 'signal', '2020-04-30 12:49:33', NULL),
(7, 'chaînes satellite', 'fa-rss', '2020-04-30 16:11:08', NULL),
(9, 'Téléphone fixe direct', 'phone-square', '2020-04-30 16:40:26', NULL),
(10, 'Réfrigérateur', 'window-minimize', '2020-04-30 16:51:13', NULL),
(11, 'Mini bar', 'glass', '2020-04-30 16:52:43', NULL),
(12, 'Coffre-fort individuel', 'hdd-o', '2020-04-30 17:01:32', NULL),
(13, 'Sèche-cheveux', 'podcast', '2020-04-30 17:10:56', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `room_equipment_room`
--

CREATE TABLE `room_equipment_room` (
  `room_equipment_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `room_equipment_room`
--

INSERT INTO `room_equipment_room` (`room_equipment_id`, `room_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(3, 7),
(3, 8),
(3, 9),
(3, 10),
(3, 11),
(3, 12),
(3, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(4, 7),
(4, 8),
(4, 9),
(4, 10),
(4, 11),
(4, 12),
(4, 13),
(4, 15),
(4, 16),
(4, 18),
(4, 19),
(4, 20),
(4, 21),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(5, 14),
(5, 15),
(5, 17),
(5, 18),
(5, 19),
(5, 20),
(5, 21),
(5, 22),
(5, 23),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 29),
(5, 30),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 18),
(6, 19),
(6, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(6, 25),
(6, 26),
(6, 27),
(6, 28),
(6, 29),
(6, 30),
(7, 16),
(7, 17),
(7, 18),
(7, 19),
(7, 20),
(7, 21),
(7, 22),
(7, 23),
(7, 24),
(9, 16),
(9, 17),
(9, 18),
(9, 19),
(9, 20),
(9, 21),
(9, 22),
(9, 23),
(9, 24),
(9, 26),
(9, 27),
(9, 28),
(9, 29),
(9, 30),
(10, 16),
(10, 17),
(10, 18),
(10, 19),
(10, 20),
(10, 21),
(10, 22),
(10, 23),
(10, 24),
(10, 25),
(10, 26),
(10, 27),
(10, 28),
(10, 29),
(10, 30),
(11, 16),
(11, 17),
(11, 18),
(11, 19),
(11, 20),
(11, 21),
(11, 22),
(11, 23),
(11, 24),
(11, 26),
(11, 27),
(11, 28),
(11, 29),
(11, 30),
(12, 16),
(12, 17),
(12, 18),
(12, 19),
(12, 20),
(12, 21),
(12, 22),
(12, 23),
(12, 24),
(12, 25),
(12, 26),
(12, 27),
(12, 28),
(12, 29),
(12, 30),
(13, 16),
(13, 17),
(13, 18),
(13, 19),
(13, 20),
(13, 21),
(13, 22),
(13, 23),
(13, 24),
(13, 25),
(13, 26),
(13, 27),
(13, 28),
(13, 29),
(13, 30);

-- --------------------------------------------------------

--
-- Structure de la table `room_room_category`
--

CREATE TABLE `room_room_category` (
  `room_id` int(11) NOT NULL,
  `room_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `room_room_category`
--

INSERT INTO `room_room_category` (`room_id`, `room_category_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `service`
--

INSERT INTO `service` (`id`, `title`, `subtitle`, `description`, `filename`, `created_at`, `updated_at`, `icon`, `price`) VALUES
(1, 'Family Brunch', '<p>Navette lagunaire (trajet aller/retour) Ambiance festive Buffet grillades et sp&eacute;cialit&eacute;s africaines Open bar (hors alcools) Acc&egrave;s &agrave; la piscine *Services suppl&eacute;mentaires sur demande</p>', '<p>Navette lagunaire (trajet aller/retour) Ambiance festive Buffet grillades et sp&eacute;cialit&eacute;s africaines Open bar (hors alcools) Acc&egrave;s &agrave; la piscine *Services suppl&eacute;mentaires sur demande Navette lagunaire (trajet aller/retour) Ambiance festive Buffet grillades et sp&eacute;cialit&eacute;s africaines Open bar (hors alcools) Acc&egrave;s &agrave; la piscine *Services suppl&eacute;mentaires sur demande Navette lagunaire (trajet aller/retour) Ambiance festive Buffet grillades et sp&eacute;cialit&eacute;s africaines Open bar (hors alcools) Acc&egrave;s &agrave; la piscine *Services suppl&eacute;mentaires sur demande</p>', '5e880672bd995694559554.jpg', '2020-04-01 23:40:17', '2020-04-04 04:00:50', 'fa fa-swimming-pool', 50000),
(2, 'Event Pool Party', '<p><strong>Ambiance afro-fusion Acc&egrave;s sur s&eacute;lection d&rsquo;une formule de participation</strong></p>', '<h1 style=\"margin-left:40px\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><span style=\"font-size:12px\"><span style=\"background-color:#f5f5f5\"><span style=\"color:#000000\">Bleu recouvert d&#39;un plateau d&#39;ic&ocirc;ne de nourriture isol&eacute; sur fond vert.</span></span></span></span></h1>\r\n\r\n<h1 style=\"margin-left:40px\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><span style=\"font-size:12px\"><span style=\"background-color:#f5f5f5\"><span style=\"color:#000000\">&nbsp;Signe de plateau et couvercle.&nbsp;Cloche de restaurant avec couvercle.&nbsp;</span></span></span></span></h1>\r\n\r\n<h1 style=\"margin-left:40px\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><span style=\"font-size:12px\"><span style=\"background-color:#f5f5f5\"><span style=\"color:#000000\">Symbole d&#39;ustensiles de cuisine.&nbsp;Vector ...&nbsp;Voir Plus</span></span></span></span></h1>', '5ea9f9a211f95705195230.jpg', '2020-04-30 00:03:13', '2020-04-30 00:03:13', 'fa fa-swimming-pool', 60000),
(3, 'Hébergements', '<p><strong>CHAMBRE SUPERIEURE, SUITE COTE JARDIN, SUITE COTE LAGUNE</strong></p>', '<p><strong>CHAMBRE SUPERIEURE, SUITE COTE JARDIN, SUITE COTE LAGUNE</strong></p>\r\n\r\n<p><strong>CHAMBRE SUPERIEURE, SUITE COTE JARDIN, SUITE COTE LAGUNE</strong></p>\r\n\r\n<p><strong>CHAMBRE SUPERIEURE, SUITE COTE JARDIN, SUITE COTE LAGUNE</strong></p>', '5ea9fac42f70c717771382.jpg', '2020-04-30 00:08:04', '2020-04-30 00:08:04', 'fa fa-swimming-pool', 80000),
(4, 'LOCATION PISCINE', '<p><span style=\"font-size:14px\"><strong>Services Sur Demande</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>jacuzzi piscine (10 places)</strong></span></p>', '<p><span style=\"font-size:14px\"><strong>Services Sur Demande</strong></span></p>\r\n\r\n<p><span style=\"font-size:14px\"><strong>jacuzzi piscine (10 places)</strong></span></p>', '5ecbb0cb687e1226878198.jpg', '2020-04-30 00:10:45', '2020-05-25 13:49:31', 'fa fa-swimming-pool', 120000),
(5, 'LOCATION DE SALE', 'SERVICES SUR  DEMANDE', 'SÉMINAIRE D\'ENTREPRISE', '5ee0e7a90222a076489895.jpg', '2020-06-10 15:58:52', '2020-06-10 16:01:12', 'fa fa-swimming-pool', 0);

-- --------------------------------------------------------

--
-- Structure de la table `service_booking`
--

CREATE TABLE `service_booking` (
  `id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `booker_id` int(11) NOT NULL,
  `booking_at` datetime NOT NULL,
  `started_at` datetime NOT NULL,
  `ended_at` datetime NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `service_booking`
--

INSERT INTO `service_booking` (`id`, `service_id`, `booker_id`, `booking_at`, `started_at`, `ended_at`, `amount`) VALUES
(2, 1, 5, '2020-04-17 22:01:51', '2020-04-24 22:01:51', '2020-05-20 22:01:51', 0),
(3, 1, 5, '2020-04-17 22:04:54', '2020-04-24 22:04:54', '2020-05-20 22:04:54', 0),
(4, 1, 5, '2020-04-29 22:12:10', '2020-04-24 22:12:10', '2020-06-04 22:12:10', 0),
(5, 1, 5, '2020-04-24 23:19:26', '2020-04-24 23:19:26', '2020-04-25 23:19:26', 0),
(6, 3, 23, '2020-06-16 09:50:35', '2020-06-02 09:50:35', '2020-06-15 09:50:35', 0),
(7, 3, 23, '2020-06-19 09:54:57', '2020-06-02 09:54:57', '2020-06-27 09:54:57', 0),
(8, 3, 23, '2020-06-24 09:56:43', '2020-06-02 09:56:43', '2020-06-24 09:56:43', 0),
(9, 3, 23, '2020-06-23 09:58:17', '2020-06-02 09:58:17', '2020-06-27 09:58:17', 0),
(10, 3, 23, '2020-06-23 10:10:15', '2020-06-02 10:10:15', '2020-06-27 10:10:15', 0),
(11, 3, 23, '2020-06-23 10:10:58', '2020-06-02 10:10:58', '2020-06-27 10:10:58', 0),
(12, 3, 23, '2020-06-23 10:13:16', '2020-06-02 10:13:16', '2020-06-27 10:13:16', 0),
(13, 3, 23, '2020-06-23 10:23:42', '2020-06-02 10:23:42', '2020-06-27 10:23:42', 0),
(14, 3, 23, '2020-06-23 10:25:24', '2020-06-02 10:25:24', '2020-06-27 10:25:24', 0),
(15, 3, 23, '2020-06-16 10:25:46', '2020-06-02 10:25:46', '2020-06-17 10:25:46', 0),
(16, 3, 23, '2020-06-23 10:27:01', '2020-06-02 10:27:01', '2020-06-26 10:27:01', 0),
(17, 3, 23, '2020-06-16 10:28:04', '2020-06-02 10:28:04', '2020-06-23 10:28:04', 0),
(18, 3, 23, '2020-06-30 10:36:13', '2020-06-02 10:36:12', '2020-06-23 10:36:13', 0),
(19, 3, 23, '2020-06-30 10:36:20', '2020-06-02 10:36:20', '2020-06-23 10:36:20', 0),
(20, 3, 23, '2020-06-30 11:02:03', '2020-06-02 11:02:03', '2020-06-23 11:02:03', 0),
(21, 3, 23, '2020-06-30 11:02:08', '2020-06-02 11:02:08', '2020-06-23 11:02:08', 0),
(22, 3, 23, '2020-06-30 11:22:39', '2020-06-02 11:22:39', '2020-06-23 11:22:39', 0),
(23, 3, 23, '2020-06-30 11:44:50', '2020-06-02 11:44:49', '2020-06-23 11:44:50', 0),
(24, 3, 23, '2020-06-30 11:47:11', '2020-06-02 11:47:11', '2020-06-23 11:47:11', 0),
(25, 3, 23, '2020-06-30 11:55:21', '2020-06-02 11:55:21', '2020-06-23 11:55:21', 0),
(26, 3, 23, '2020-06-30 11:57:36', '2020-06-02 11:57:36', '2020-06-23 11:57:36', 0),
(27, 3, 23, '2020-06-30 12:01:56', '2020-06-02 12:01:56', '2020-06-23 12:01:56', 0),
(28, 3, 23, '2020-06-30 12:10:48', '2020-06-02 12:10:48', '2020-06-23 12:10:48', 0),
(29, 3, 23, '2020-06-30 12:11:50', '2020-06-02 12:11:50', '2020-06-23 12:11:50', 0),
(30, 3, 23, '2020-06-30 12:15:31', '2020-06-02 12:15:31', '2020-06-23 12:15:31', 0),
(31, 3, 23, '2020-06-30 12:21:05', '2020-06-02 12:21:05', '2020-06-23 12:21:05', 0),
(32, 3, 23, '2020-06-30 12:21:23', '2020-06-02 12:21:23', '2020-06-23 12:21:23', 0),
(33, 3, 23, '2020-06-30 12:33:22', '2020-06-02 12:33:22', '2020-06-23 12:33:22', 0),
(34, 3, 23, '2020-06-30 12:34:02', '2020-06-02 12:34:02', '2020-06-23 12:34:02', 0),
(35, 3, 23, '2020-06-30 12:34:07', '2020-06-02 12:34:07', '2020-06-23 12:34:07', 0),
(36, 3, 23, '2020-06-30 12:34:44', '2020-06-02 12:34:44', '2020-06-23 12:34:44', 0),
(37, 3, 23, '2020-06-30 12:36:20', '2020-06-02 12:36:20', '2020-06-23 12:36:20', 0),
(38, 3, 23, '2020-06-30 12:36:54', '2020-06-02 12:36:54', '2020-06-23 12:36:54', 0),
(39, 3, 23, '2020-06-30 12:39:29', '2020-06-02 12:39:29', '2020-06-23 12:39:29', 0),
(40, 3, 23, '2020-06-30 12:42:35', '2020-06-02 12:42:35', '2020-06-22 12:42:35', 0),
(41, 3, 23, '2020-06-30 12:49:36', '2020-06-02 12:49:36', '2020-06-22 12:49:36', 0),
(42, 3, 23, '2020-06-30 12:50:13', '2020-06-02 12:50:13', '2020-06-22 12:50:13', 0),
(43, 3, 23, '2020-06-30 12:51:24', '2020-06-02 12:51:24', '2020-06-22 12:51:24', 0),
(44, 3, 23, '2020-06-30 12:51:45', '2020-06-02 12:51:45', '2020-06-22 12:51:45', 0),
(45, 3, 23, '2020-06-30 12:52:19', '2020-06-02 12:52:19', '2020-06-22 12:52:19', 0),
(46, 3, 23, '2020-06-30 12:52:50', '2020-06-02 12:52:50', '2020-06-22 12:52:50', 0),
(47, 3, 23, '2020-06-30 12:53:31', '2020-06-02 12:53:31', '2020-06-22 12:53:31', 0),
(48, 3, 23, '2020-06-30 12:53:47', '2020-06-02 12:53:47', '2020-06-22 12:53:47', 0),
(49, 3, 23, '2020-06-30 12:54:09', '2020-06-02 12:54:09', '2020-06-22 12:54:09', 0),
(50, 3, 23, '2020-06-30 12:58:36', '2020-06-02 12:58:36', '2020-06-22 12:58:36', 0),
(51, 3, 23, '2020-06-30 13:01:30', '2020-06-02 13:01:27', '2020-06-22 13:01:30', 0),
(52, 3, 23, '2020-06-30 13:02:08', '2020-06-02 13:02:08', '2020-06-22 13:02:08', 0),
(53, 3, 23, '2020-06-30 13:02:18', '2020-06-02 13:02:18', '2020-06-22 13:02:18', 0),
(54, 3, 23, '2020-06-30 13:04:33', '2020-06-02 13:04:33', '2020-06-22 13:04:33', 0),
(55, 3, 23, '2020-06-30 13:08:56', '2020-06-02 13:08:56', '2020-06-22 13:08:56', 0),
(56, 3, 23, '2020-06-30 13:12:34', '2020-06-02 13:12:34', '2020-06-22 13:12:34', 0),
(57, 3, 23, '2020-06-30 13:12:38', '2020-06-02 13:12:38', '2020-06-22 13:12:38', 0),
(58, 3, 23, '2020-06-30 13:12:55', '2020-06-02 13:12:55', '2020-06-22 13:12:55', 0),
(59, 3, 23, '2020-06-30 13:14:58', '2020-06-02 13:14:58', '2020-06-22 13:14:58', 0),
(60, 3, 23, '2020-06-30 13:15:02', '2020-06-02 13:15:02', '2020-06-22 13:15:02', 0),
(61, 3, 23, '2020-06-30 13:15:17', '2020-06-02 13:15:17', '2020-06-22 13:15:17', 0),
(62, 3, 23, '2020-06-30 13:15:21', '2020-06-02 13:15:21', '2020-06-22 13:15:21', 0),
(63, 3, 23, '2020-06-30 13:15:36', '2020-06-02 13:15:36', '2020-06-22 13:15:36', 0),
(64, 3, 23, '2020-06-30 13:15:50', '2020-06-02 13:15:50', '2020-06-22 13:15:50', 0),
(65, 3, 23, '2020-06-30 13:16:48', '2020-06-02 13:16:48', '2020-06-22 13:16:48', 0),
(66, 3, 23, '2020-06-30 13:18:14', '2020-06-02 13:18:14', '2020-06-22 13:18:14', 0),
(67, 3, 23, '2020-06-30 13:21:04', '2020-06-02 13:21:04', '2020-06-22 13:21:04', 0),
(68, 3, 23, '2020-06-30 13:21:37', '2020-06-02 13:21:37', '2020-06-22 13:21:37', 0),
(69, 3, 23, '2020-06-30 13:22:13', '2020-06-02 13:22:13', '2020-06-22 13:22:13', 0),
(70, 3, 23, '2020-06-30 13:22:17', '2020-06-02 13:22:17', '2020-06-22 13:22:17', 0),
(71, 3, 23, '2020-06-30 13:22:58', '2020-06-02 13:22:58', '2020-06-22 13:22:58', 0),
(72, 3, 23, '2020-06-30 13:26:02', '2020-06-02 13:26:02', '2020-06-22 13:26:02', 0),
(73, 3, 23, '2020-06-30 13:36:57', '2020-06-02 13:36:57', '2020-06-22 13:36:57', 0),
(74, 3, 23, '2020-06-30 13:43:44', '2020-06-02 13:43:44', '2020-06-22 13:43:44', 0),
(75, 3, 23, '2020-06-30 13:51:24', '2020-06-02 13:51:24', '2020-06-22 13:51:24', 0),
(76, 3, 23, '2020-06-30 13:53:30', '2020-06-02 13:53:30', '2020-06-22 13:53:30', 0),
(77, 3, 23, '2020-06-30 13:56:55', '2020-06-02 13:56:55', '2020-06-22 13:56:55', 0),
(78, 3, 23, '2020-06-30 14:00:58', '2020-06-02 14:00:58', '2020-06-22 14:00:58', 0),
(79, 3, 23, '2020-06-30 15:44:21', '2020-06-02 15:44:21', '2020-06-22 15:44:21', 0),
(80, 3, 23, '2020-06-30 15:45:58', '2020-06-02 15:45:58', '2020-06-22 15:45:58', 0),
(81, 3, 23, '2020-06-30 15:54:48', '2020-06-02 15:54:48', '2020-06-22 15:54:48', 0),
(82, 3, 23, '2020-06-30 15:56:57', '2020-06-02 15:56:57', '2020-06-22 15:56:57', 0),
(83, 1, 23, '2020-06-23 16:05:05', '2020-06-02 16:05:05', '2020-06-27 16:05:05', 0),
(84, 1, 23, '2020-06-23 16:05:13', '2020-06-02 16:05:13', '2020-06-27 16:05:13', 0),
(85, 1, 23, '2020-06-23 16:05:34', '2020-06-02 16:05:34', '2020-06-27 16:05:34', 0),
(86, 1, 23, '2020-06-23 16:51:50', '2020-06-02 16:51:50', '2020-06-27 16:51:50', 0),
(87, 3, 5, '2020-06-04 17:18:40', '2020-06-02 17:18:40', '2020-06-06 17:18:40', 0),
(88, 4, 24, '2020-08-03 18:02:38', '2020-06-02 18:02:38', '2020-12-01 18:02:38', 0);

-- --------------------------------------------------------

--
-- Structure de la table `service_tariff`
--

CREATE TABLE `service_tariff` (
  `service_id` int(11) NOT NULL,
  `tariff_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `service_tariff`
--

INSERT INTO `service_tariff` (`service_id`, `tariff_id`) VALUES
(1, 1),
(1, 3),
(2, 2),
(2, 3),
(3, 3),
(4, 2),
(4, 3),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `slide`
--

INSERT INTO `slide` (`id`, `title`, `filename`, `created_at`, `updated_at`) VALUES
(1, 'premier slide', '5e8220ef58f58164808977.jpg', '2020-03-30 16:40:14', '2020-03-30 16:40:14'),
(2, 'premier slide', '5e82491f98f0f767704614.jpg', '2020-03-30 19:31:43', '2020-03-30 19:31:43');

-- --------------------------------------------------------

--
-- Structure de la table `slidelayer`
--

CREATE TABLE `slidelayer` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_x` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_hoffset` int(11) DEFAULT NULL,
  `data_y` int(11) DEFAULT NULL,
  `data_voffset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_responsive_offset` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_whitespace` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `slidelayer`
--

INSERT INTO `slidelayer` (`id`, `title`, `class`, `data_x`, `data_hoffset`, `data_y`, `data_voffset`, `data_responsive_offset`, `data_whitespace`, `created_at`, `updated_at`) VALUES
(1, 'tuyririror', 'jgjghghh', 'center', 410, 201, 'align', 'left', 'right', '2020-03-30 16:34:55', NULL),
(2, 'tuyririror', 'jgjghghh', 'center', 245, 540, 'align', 'left', 'right', '2020-03-30 19:29:48', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `slide_slidelayer`
--

CREATE TABLE `slide_slidelayer` (
  `slide_id` int(11) NOT NULL,
  `slidelayer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `slide_slidelayer`
--

INSERT INTO `slide_slidelayer` (`slide_id`, `slidelayer_id`) VALUES
(1, 1),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `tariff`
--

CREATE TABLE `tariff` (
  `id` int(11) NOT NULL,
  `type_of_tariff_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `tariff`
--

INSERT INTO `tariff` (`id`, `type_of_tariff_id`, `title`, `price`, `detail`, `created_at`, `updated_at`) VALUES
(1, 2, 'Tarif Adulte', 15000, 'Expected argument of type \"App\\Entity\\TypeOfTariff or null\", \"instance of Doctrine\\Common\\Collections\\ArrayCollection\" given at property path \"typeOfTariff\".', '2020-04-03 15:49:14', NULL),
(2, 1, 'Tarif Adulte', 15000, '<p><u>CKEditor 5 core</u></p>\r\n\r\n<p>est con&ccedil;u pour g&eacute;rer un mod&egrave;le de donn&eacute;es personnalis&eacute; structur&eacute; en arborescence.</p>\r\n\r\n<blockquote>\r\n<p>&nbsp;Cela permet de mettre en &oelig;uvre une&nbsp;<strong>collaboration en temps r&eacute;el</strong>&nbsp;rapide et fiable au&nbsp;<strong>sein de structures complexes</strong>&nbsp;telles que des tables ou des widgets imbriqu&eacute;s.</p>\r\n</blockquote>', '2020-04-03 17:58:18', NULL),
(3, 3, 'Tarif Evenement de fin d\'Année', 250000, '<p><span style=\"font-size:16px\"><strong>ce tarif correspond au faites de fin d&#39;ann&eacute;es</strong></span></p>', '2020-04-04 01:54:55', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `type_of_tariff`
--

CREATE TABLE `type_of_tariff` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `type_of_tariff`
--

INSERT INTO `type_of_tariff` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Tarif Gold Prémium', '2020-04-03 15:35:01', NULL),
(2, 'Tarif Gold Prémium VVIP', '2020-04-03 15:36:56', NULL),
(3, 'Tarif Gold Prémium Président', '2020-04-04 01:50:55', NULL),
(4, 'Tarif Familial', '2020-04-04 01:51:38', NULL),
(5, 'Tarif Client Fidel', '2020-04-04 01:52:18', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `confirmation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `phone`, `address`, `city`, `password`, `status`, `confirmation_token`, `reset_token`, `created_at`, `updated_at`) VALUES
(5, 'kpegowebmobile@gmail.com', 'N\'drin roger Anani', 'KPEGO', '77576438', 'Cocody', 'abidjan Cocody', '$argon2i$v=19$m=65536,t=4,p=1$MVRqV3J5d09xZHhFZ2VkTg$JDMAL5MQwuB8K1YGJKe7rOW6N2Z2j6o/+ixRI0v0SVI', 1, '794cca5dc9b306de1f60a699022b27fd', NULL, '2020-03-26 15:09:14', NULL),
(7, 'silva@gmail.com', 'cirill', 'konate', '77576438', 'Cocody', 'abidjan', '$argon2i$v=19$m=65536,t=4,p=1$UFlzV0lHZ0ZxdUdsdnYzNw$RgDAVEa03ga3LZ92Nq0tTRSQhvxANSiVoZ+Rh4ZxgQw', 1, 'ea4f2f08ea029d6f837cad2e8bb64397', NULL, '2020-04-23 13:40:16', NULL),
(8, 'admin@gmail.com', 'N\'drin roger', 'KPEGO', '77576438', 'Cocody', 'abidjan', '$argon2i$v=19$m=65536,t=4,p=1$WENpTUEuYk5qaEk3dmd5Tw$vlag5Kh2urLrbrThIJtHo4z8FEM6zRLEqYSVqxpc90Y', 1, 'fc27519edc71a1cc160e20ca7446a349', NULL, '2020-04-23 13:45:03', NULL),
(9, 'kobenan@gmail.com', 'Komenan', 'Joel', '77576438', 'Cocody', 'abidjan', '$argon2i$v=19$m=65536,t=4,p=1$bHpYbzJ3UGZkL0FWWlYzRQ$bGl5N7cYWrfWO7ESbguXQytrCfEZpLXAR3ObHhlquuA', 1, 'e1d826c449b118ece36c92d1aef371f0', NULL, '2020-04-23 15:02:11', NULL),
(15, 'katatchiev@gmail.com', 'N\'drin roger', 'KPEGO', '77576438', 'Cocody', 'abidjan', '$argon2i$v=19$m=65536,t=4,p=1$a2xETUxqYWZ2YVBWLjk1Mg$I4aC5CN/tg/pU01ZGDbj6Cuxrha723MRru4lLVeJNPc', 1, '08ce0d6d50a017d2b7ae82460eac447c', NULL, '2020-04-29 14:56:53', NULL),
(17, 'amentestajs2@gmail.com', 'Ba', 'Bi Arnaud', '0123456789', 'Paris', 'Paris', '$argon2i$v=19$m=65536,t=4,p=1$WEpzLjYwcFpmR0dQbm9SbQ$8LxXoKHzfZ4ghKTZqY3kbY8GJyjV+ADMfzJ4PxDk7bA', 1, '8ae66041d8a272d0f99acfb80431264d', NULL, '2020-04-30 11:39:31', NULL),
(18, 'knrogsucces1@gmail.com', 'bill', 'Toussaint', '77576438', 'Cocody', 'ABIDJAN', '$argon2i$v=19$m=65536,t=4,p=1$TzVpTHV2YWs3bXFlZVNsbA$HFVbU9ssaraLK0u8jJm11V+z3CVZXnBpfUppP3uIVBQ', 1, '2e0660ab32b939cddfdd185846c0c30e', NULL, '2020-04-30 11:42:16', NULL),
(19, 'angeeric1992@gmail.com', 'Ange', 'Eric', '0123456789', 'Paris', 'Paris', '$argon2i$v=19$m=65536,t=4,p=1$ajczWkMuN0U3RVI2ejVhRg$lXT3xT7p9K162lFt0ii96vGKJrfRxkfZqqmy5CytmfI', 1, '4b4e5d2d9f9137263bc3bc2b0aef7abe', NULL, '2020-04-30 11:56:02', NULL),
(20, 'amenjsajs@gmail.com', 'Eric', 'Ange', '0123456789', 'Paris', 'Paris', '$argon2i$v=19$m=65536,t=4,p=1$MmFCOGxrVlkzSFRmYlhVLw$LjeRT6X+Iffp5lBSHYDIbwXgttox5jxwnJOpf1/lCB0', 1, '453169a449c19d0955bd8a7512402c6e', NULL, '2020-04-30 12:01:27', NULL),
(21, 'akawainnocent@gmail.com', 'innocent boris', 'ano', '49216250', 'akawainnocent@gmail.com', 'abidjan', '$argon2i$v=19$m=65536,t=4,p=1$cld5WUNPYWF4TkcvVk1kaA$ZbmZE8b27NEzGTaU+vGa36YLue4n4RLPHr5eaqin6Mk', 1, '7dc5db7a2c2f3fd161850f6c29caeb38', NULL, '2020-04-30 12:30:03', NULL),
(22, 'aroger@pkdtechnologiesinc.com', 'Varlet', 'Michel Ange', '07359830', 'Cocody', 'Abidjan', '$argon2i$v=19$m=65536,t=4,p=1$TEY4cU55S3U0VngyWkZiRQ$Qc9aDZafiW7xzLiupgOWivEKvr3/Db/vEYhuA+yTyDU', 1, NULL, NULL, '2020-06-01 01:36:49', NULL),
(23, 'sup@bbr.ci', 'test', 'TEST', '00000225', 'sup', 'TEST', '$argon2i$v=19$m=65536,t=4,p=1$bEZ6M1BSVXMvWGREUnJ2aw$imIPP6nIDly8sNWBUSIThSkBvpvffIbos+sMopLofWk', 1, '8050f66c979e628e86228fe836abdaf3', NULL, '2020-06-02 09:47:32', NULL),
(24, 'knrogsucces1@yahoo.fr', 'ROGER', 'KPEGO', '02833853', 'ABIDJAN', 'Abidjan', '$argon2i$v=19$m=65536,t=4,p=1$bEJMVXhMejlwTnIxYXFiRQ$j1b94xjI3bRgoJAajfMTrMzxBq+nMmnOkwTyXNH4u9A', 1, NULL, NULL, '2020-06-02 17:59:27', NULL),
(25, 'kone@gmail.com', 'ROGER', 'ROGER', '77576438', 'Cotonou', 'Cotonou', '$argon2i$v=19$m=65536,t=4,p=1$dlI3MDRwaWVNWGlIZEwuVw$Bwn/c61ALUC253xBnvV2ZcccE9cA8cwIE/A5qTd/1gk', 1, '43ce8350cb6066603de8edfe20a716d9', NULL, '2020-06-02 19:03:30', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(5, 2),
(7, 1),
(8, 1),
(9, 1),
(15, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4FBF094FA76ED395` (`user_id`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `event_booking`
--
ALTER TABLE `event_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_655B447171F7E88B` (`event_id`),
  ADD KEY `IDX_655B44718B7E4006` (`booker_id`);

--
-- Index pour la table `event_tariff`
--
ALTER TABLE `event_tariff`
  ADD PRIMARY KEY (`event_id`,`tariff_id`),
  ADD KEY `IDX_A6FC572F71F7E88B` (`event_id`),
  ADD KEY `IDX_A6FC572F92348FD2` (`tariff_id`);

--
-- Index pour la table `global_setting`
--
ALTER TABLE `global_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_F4F0787922BF681` (`site_logo_id`);

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C53D045F54177093` (`room_id`);

--
-- Index pour la table `migration_versions`
--
ALTER TABLE `migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_729F519BE4873418` (`main_image_id`);

--
-- Index pour la table `room_booking`
--
ALTER TABLE `room_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C2E513E54177093` (`room_id`),
  ADD KEY `IDX_C2E513E8B7E4006` (`booker_id`);

--
-- Index pour la table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room_equipment`
--
ALTER TABLE `room_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `room_equipment_room`
--
ALTER TABLE `room_equipment_room`
  ADD PRIMARY KEY (`room_equipment_id`,`room_id`),
  ADD KEY `IDX_11B7760E70DF16D` (`room_equipment_id`),
  ADD KEY `IDX_11B776054177093` (`room_id`);

--
-- Index pour la table `room_room_category`
--
ALTER TABLE `room_room_category`
  ADD PRIMARY KEY (`room_id`,`room_category_id`),
  ADD KEY `IDX_CF1A69E354177093` (`room_id`),
  ADD KEY `IDX_CF1A69E367333DD` (`room_category_id`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `service_booking`
--
ALTER TABLE `service_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2F88BF42ED5CA9E6` (`service_id`),
  ADD KEY `IDX_2F88BF428B7E4006` (`booker_id`);

--
-- Index pour la table `service_tariff`
--
ALTER TABLE `service_tariff`
  ADD PRIMARY KEY (`service_id`,`tariff_id`),
  ADD KEY `IDX_AAA2254BED5CA9E6` (`service_id`),
  ADD KEY `IDX_AAA2254B92348FD2` (`tariff_id`);

--
-- Index pour la table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slidelayer`
--
ALTER TABLE `slidelayer`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `slide_slidelayer`
--
ALTER TABLE `slide_slidelayer`
  ADD PRIMARY KEY (`slide_id`,`slidelayer_id`),
  ADD KEY `IDX_C71C8541DD5AFB87` (`slide_id`),
  ADD KEY `IDX_C71C85414F3F9DB9` (`slidelayer_id`);

--
-- Index pour la table `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_9465207D221395D1` (`type_of_tariff_id`);

--
-- Index pour la table `type_of_tariff`
--
ALTER TABLE `type_of_tariff`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `IDX_2DE8C6A3A76ED395` (`user_id`),
  ADD KEY `IDX_2DE8C6A3D60322AC` (`role_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `event_booking`
--
ALTER TABLE `event_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `global_setting`
--
ALTER TABLE `global_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT pour la table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `room_booking`
--
ALTER TABLE `room_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `room_equipment`
--
ALTER TABLE `room_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `service_booking`
--
ALTER TABLE `service_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT pour la table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `slidelayer`
--
ALTER TABLE `slidelayer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `tariff`
--
ALTER TABLE `tariff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `type_of_tariff`
--
ALTER TABLE `type_of_tariff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `FK_4FBF094FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `event_booking`
--
ALTER TABLE `event_booking`
  ADD CONSTRAINT `FK_655B447171F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`),
  ADD CONSTRAINT `FK_655B44718B7E4006` FOREIGN KEY (`booker_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `event_tariff`
--
ALTER TABLE `event_tariff`
  ADD CONSTRAINT `FK_A6FC572F71F7E88B` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A6FC572F92348FD2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `global_setting`
--
ALTER TABLE `global_setting`
  ADD CONSTRAINT `FK_F4F0787922BF681` FOREIGN KEY (`site_logo_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F54177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`);

--
-- Contraintes pour la table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `FK_729F519BE4873418` FOREIGN KEY (`main_image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `room_booking`
--
ALTER TABLE `room_booking`
  ADD CONSTRAINT `FK_C2E513E54177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `FK_C2E513E8B7E4006` FOREIGN KEY (`booker_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `room_equipment_room`
--
ALTER TABLE `room_equipment_room`
  ADD CONSTRAINT `FK_11B776054177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_11B7760E70DF16D` FOREIGN KEY (`room_equipment_id`) REFERENCES `room_equipment` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `room_room_category`
--
ALTER TABLE `room_room_category`
  ADD CONSTRAINT `FK_CF1A69E354177093` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CF1A69E367333DD` FOREIGN KEY (`room_category_id`) REFERENCES `room_category` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `service_booking`
--
ALTER TABLE `service_booking`
  ADD CONSTRAINT `FK_2F88BF428B7E4006` FOREIGN KEY (`booker_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_2F88BF42ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`);

--
-- Contraintes pour la table `service_tariff`
--
ALTER TABLE `service_tariff`
  ADD CONSTRAINT `FK_AAA2254B92348FD2` FOREIGN KEY (`tariff_id`) REFERENCES `tariff` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_AAA2254BED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `slide_slidelayer`
--
ALTER TABLE `slide_slidelayer`
  ADD CONSTRAINT `FK_C71C85414F3F9DB9` FOREIGN KEY (`slidelayer_id`) REFERENCES `slidelayer` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C71C8541DD5AFB87` FOREIGN KEY (`slide_id`) REFERENCES `slide` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `tariff`
--
ALTER TABLE `tariff`
  ADD CONSTRAINT `FK_9465207D221395D1` FOREIGN KEY (`type_of_tariff_id`) REFERENCES `type_of_tariff` (`id`);

--
-- Contraintes pour la table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `FK_2DE8C6A3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_2DE8C6A3D60322AC` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
