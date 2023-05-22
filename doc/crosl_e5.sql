-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 22 mai 2023 à 17:18
-- Version du serveur : 10.5.19-MariaDB-0+deb11u2
-- Version de PHP : 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crosl_e5`
--

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `AVISID` int(11) NOT NULL,
  `COMPTEID` int(11) NOT NULL,
  `SESSIONID` int(11) NOT NULL,
  `NOTE` int(11) NOT NULL,
  `COMMENTAIRE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`AVISID`, `COMPTEID`, `SESSIONID`, `NOTE`, `COMMENTAIRE`) VALUES
(1, 16, 3, 0, 'C\'était une soirée très ennuyeuse et j\'ai perdu 10€ pour rien.'),
(2, 16, 21, 2, 'Je suis déçu de cette soirée, je m\'attendais à plus d\'informations utiles pour ma carrière mais je n\'ai rien appris de nouveau.'),
(3, 16, 20, 4, 'Cette formation m\'a aidé à mieux comprendre mes responsabilités en tant que dirigeant d\'une entreprise de sport, je recommande.'),
(4, 16, 13, 5, 'J\'ai adoré cette formation, les exercices pratiques étaient très amusants et instructifs.'),
(5, 16, 7, 4, 'La formation était très bien organisée, j\'ai trouvé les instructeurs très compétents et professionnels.'),
(6, 16, 19, 5, 'C\'était une excellente formation ! Le formateur était compétent et enthousiaste. Les démonstrations pratiques étaient très instructives et m\'ont donné confiance dans mes capacités à aider en cas d\'urgence.'),
(7, 16, 22, 3, 'J\'ai appris quelques informations utiles dans cette formation, mais je n\'ai pas aimé l\'approche du formateur. Il était trop rigide et peu accessible, ce qui rendait la formation difficile à suivre.'),
(8, 16, 8, 2, 'C\'était une formation très décevante, je m\'attendais à apprendre beaucoup plus de choses.'),
(9, 16, 4, 1, 'Je n\'ai pas du tout aimé cette formation, elle était ennuyeuse et peu utile'),
(10, 16, 23, 5, 'La formation était très intéressante, j\'ai appris beaucoup de choses que je ne savais pas auparavant.'),
(13, 15, 3, 5, 'La soirée était bien organisée et le formateur était très compétent, je recommande cette formation.'),
(14, 15, 20, 2, 'Je n\'ai pas trouvé cette formation très utile, les informations étaient trop basiques et je les connaissais déjà.'),
(15, 15, 13, 3, 'Je m\'attendais à apprendre plus de choses sur Photoshop, mais cette formation était très basique.'),
(16, 15, 22, 3, 'J\'ai appris quelques informations utiles dans cette formation, mais je n\'ai pas aimé l\'approche du formateur. Il était trop rigide et peu accessible, ce qui rendait la formation difficile à suivre.'),
(17, 15, 8, 1, 'Je ne recommande pas cette soirée, les informations étaient très confuses et le formateur n\'a pas su répondre à nos questions'),
(18, 13, 3, 2, 'Je suis déçu de cette soirée, je m\'attendais à plus d\'informations utiles pour ma carrière mais je n\'ai rien appris de nouveau.'),
(19, 13, 21, 5, 'La soirée était bien organisée et le formateur était très compétent, je recommande cette formation.'),
(20, 13, 19, 5, 'C\'était une excellente formation ! Le formateur était compétent et enthousiaste. Les démonstrations pratiques étaient très instructives et m\'ont donné confiance dans mes capacités à aider en cas d\'urgence.'),
(21, 13, 22, 3, 'J\'ai appris quelques informations utiles dans cette formation, mais je n\'ai pas aimé l\'approche du formateur. Il était trop rigide et peu accessible, ce qui rendait la formation difficile à suivre.'),
(22, 13, 8, 0, 'C\'était une soirée très ennuyeuse et j\'ai perdu 10€ pour rien.'),
(23, 14, 3, 1, 'Je ne recommande pas cette soirée, les informations étaient très confuses et le formateur n\'a pas su répondre à nos questions.'),
(24, 14, 21, 4, 'Cette soirée était très informative et j\'ai appris beaucoup sur la convention collective nationale du sport.'),
(25, 14, 20, 2, 'Je n\'ai pas aimé cette formation, le formateur était trop lent et les informations étaient trop simples pour moi.'),
(26, 14, 13, 5, 'La formation était très bien structurée, j\'ai trouvé que les exercices étaient progressifs et bien adaptés.'),
(27, 14, 19, 4, 'La formation était très informative et m\'a donné beaucoup de connaissances pratiques pour aider en cas d\'urgence. J\'ai apprécié les simulations d\'urgence et la façon dont elles ont été gérées par l\'instructeur.');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `COMPTEID` int(2) NOT NULL,
  `COMPTENOM` char(32) DEFAULT NULL,
  `COMPTEPRENOM` char(32) DEFAULT NULL,
  `COMPTELOGIN` char(32) DEFAULT NULL,
  `COMPTEMOTDEPASSE` char(32) DEFAULT NULL,
  `COMPTERESPONSABLE` tinyint(1) NOT NULL,
  `COMPTEADRESSE` varchar(50) NOT NULL,
  `COMPTECP` int(11) NOT NULL,
  `COMPTEVILLE` varchar(50) NOT NULL,
  `COMPTEEMAIL` varchar(50) NOT NULL,
  `COMPTESTATUE` varchar(50) NOT NULL,
  `ASSOCIATIONNOM` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`COMPTEID`, `COMPTENOM`, `COMPTEPRENOM`, `COMPTELOGIN`, `COMPTEMOTDEPASSE`, `COMPTERESPONSABLE`, `COMPTEADRESSE`, `COMPTECP`, `COMPTEVILLE`, `COMPTEEMAIL`, `COMPTESTATUE`, `ASSOCIATIONNOM`) VALUES
(0, 'E5_RES', 'E5_RES', 'E5_RES', '6dc8c19fa406647890a2b067341258dc', 1, '12 Rue des Coteaux', 1000, 'LOBS', 'test@gmail.com', 'RES', 0),
(1, 'E5_SAL', 'E5_SAL', 'E5_SAL', '952c88dc95670de7845e42af75941490', 0, 'Coteaux', 1000, 'LOBS', 'test@gmail.com', 'SAL', 0),
(2, 'GIRAUX', 'Mme', 'GIRAUX', '7edfd953ae5f5de90a64eba19529a336', 1, '12 Rue des Coteaux', 67250, 'Lobsann', 'GIRAUX@gmail.com', 'RES', 0),
(3, 'XANTEH', 'M', 'XANTEH', '7b0165a2fd21d789637ae4fbe40f4b57', 1, '41 Rue de la Chapelle', 28240, 'Friaize', 'XANTEH@gmail.com', 'RES', 0),
(4, 'WEISS', 'Adele', 'WEISS', '6621c08b4cba712b6e037637187ffda7', 0, '42 Rue Raoul de Guigne', 38680, 'Le Touvet', 'WEISS@gmail.com', 'SAL', 0),
(5, 'GERMAIN', 'Felix', 'GERMAIN', 'db8b70cbff4cc6762539df4be02b1c6a', 0, '38 Avenue de la Maisonnette', 9700, 'Lissac ', 'GERMAIN@gmail.com', 'STG', 0),
(6, 'BORIES', 'Bastien', 'BORIES', '2d1320a1d796ee02704304e9fa35bf33', 1, '118 Rte de Narbonne', 31400, 'Toulouse', 'bastienbories81pro@gmail.com', 'RES', 0),
(7, 'GUICHARD', 'Florian', 'GUICHARD', '8867c4945751cac02d08e43f5c1edb6d', 1, '19 Rue des Richolets', 31400, 'Toulouse', '', 'RES', 0),
(8, 'PERRICHET', 'Killian', 'PERRICHET', 'd277af70eb9208fdefa64f81938f2f01', 0, '34 Boulevard Ernest Dalby', 31200, 'Toulouse', 'perrichetkillian@gmail.com', 'SAL', 0),
(9, 'DUPONT', 'Jean', 'DUPONT', '49c90806e1706d011b9c96d667b80aa0', 0, '1 Rue des Lilas', 75000, 'Paris', 'jean.dupont@gmail.com', 'SAL', 0),
(10, 'DURAND', 'Marie', 'DURAND', '9810932890b046e7c2e5ecd9b6f3bd2e', 0, '5 Rue du Faubourg', 69000, 'Lyon', 'marie.durand@gmail.com', 'SAL', 0),
(11, 'LEROY', 'Pierre', 'LEROY', 'd76715592f39792da9a1a9c938fd35c4', 0, '10 Rue de la Paix', 13000, 'Marseille', 'pierre.leroy@gmail.com', 'SAL', 0),
(12, 'MOREAU', 'Sophie', 'MOREAU', '00a4ad381ad6b6e83e61f322a86b801a', 0, '15 Rue de la Gare', 44000, 'Nantes', 'sophie.moreau@gmail.com', 'SAL', 0),
(13, 'PETIT', 'Luc', 'PETIT', '25ff1b53154457da148d763d87b75fca', 0, '25 Rue de la Plage', 34000, 'Montpellier', 'luc.petit@gmail.com', 'SAL', 0),
(14, 'ROUSSEAU', 'Emilie', 'ROUSSEAU', '2859ada1eee7484b1bbc4cda8f61f3b7', 0, '20 Rue de la Liberté', 59000, 'Lille', 'emilie.rousseau@gmail.com', 'SAL', 0),
(15, 'BERNARD', 'Marc', 'BERNARD', '3919071bacdbe6c55ae63908d02bce15', 0, '30 Rue de la République', 31000, 'Toulouse', 'marc.bernard@gmail.com', 'SAL', 0),
(16, 'DUBOIS', 'Camille', 'DUBOIS', 'dcfccb10e0e3c17ff900de98b978acf8', 0, '8 Rue du Château', 25000, 'Besançon', 'camille.dubois@gmail.com', 'SAL', 0),
(17, 'GIRARD', 'Louis', 'GIRARD', '246df4e390a325840a5a2702f21de41e', 0, '12 Rue de la Victoire', 69000, 'Lyon', 'louis.girard@gmail.com', 'SAL', 0);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `DOMAINID` int(2) NOT NULL,
  `DOMAINLABEL` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`DOMAINID`, `DOMAINLABEL`) VALUES
(0, 'GESTION'),
(1, 'INFORMATIQUE'),
(2, 'DEVELOPPEMENT DURABLE'),
(3, 'SECOURISME'),
(4, 'COMMUNICATION');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `DOMAINID` int(2) NOT NULL,
  `FORMATIONID` int(2) NOT NULL,
  `FORMATIONNOM` char(255) DEFAULT NULL,
  `FORMATIONLABEL` char(255) DEFAULT NULL,
  `FORMATIONCOUT` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`DOMAINID`, `FORMATIONID`, `FORMATIONNOM`, `FORMATIONLABEL`, `FORMATIONCOUT`) VALUES
(0, 0, 'Soirée d\'information sur la convention collective nationale du sport', 'Cette soirée d\'information a pour but de sensibiliser les professionnels du sport à la convention collective nationale qui régit leurs conditions de travail.', 10.00),
(0, 1, 'Actualisation des connaissances sur la convention collective nationale du sport et la responsabilité des dirigeants.', 'Cette formation a pour objectif de mettre à jour les connaissances des dirigeants du sport sur la convention collective nationale qui régit les conditions de travail dans leur secteur.', 1.00),
(0, 2, 'Comptabilité.', 'Cette formation en comptabilité vous donnera les connaissances de base en comptabilité et en gestion financière.', 2.00),
(0, 3, 'Recherche de partenariat', 'Cette formation vous aidera à développer vos compétences en matière de recherche de partenariats pour votre entreprise ou votre organisation.', 45.00),
(1, 0, 'Outlook Niveau 1', 'Cette formation Outlook de niveau 1 vous enseignera les bases du logiciel de messagerie et de gestion de planning de Microsoft.', 63.00),
(1, 1, 'Outlook Niveau 2', 'Cette formation Outlook de niveau 2 est destinée aux utilisateurs ayant déjà une connaissance de base d\'Outlook et souhaitant approfondir leurs compétences.', 87.00),
(1, 2, 'Power point Niveau 2', NULL, 30.00),
(1, 3, 'Photoshop Niveau 1', 'Cette formation Photoshop de niveau 1 vous enseignera les bases du logiciel de retouche d\'image de Adobe.', 50.00),
(1, 4, 'Photoshop Niveau 2', 'Cette formation Photoshop de niveau 2 est destinée aux utilisateurs ayant déjà une connaissance de base de Photoshop et souhaitant approfondir leurs compétences.', 40.00),
(2, 0, 'Organiser une manifestation éco responsable.', NULL, 10.00),
(3, 0, 'Prévention et secours civique (PSC).', 'Cette formation en prévention et secours civique (PSC) vous enseignera les compétences de base pour protéger votre vie et celle des autres en cas d\'incident ou de catastrophe.', 12.00),
(3, 1, 'Bonnes pratiques et premiers secours.', 'Cette formation vous aidera à acquérir les compétences de base en matière de premiers secours et à mettre en place des bonnes pratiques pour protéger votre santé et celle des autres.', 13.00),
(4, 0, 'Conduite de réunion.', 'Cette formation vous aidera à devenir un meilleur chef de réunion en vous enseignant les compétences de base pour planifier et animer des réunions efficaces.', 76.00),
(4, 1, 'Communiquer avec la presse.', NULL, 65.00),
(4, 2, 'Langues étrangères.', NULL, 54.00);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `LIEUID` int(2) NOT NULL,
  `LIEUNOMSALLE` char(32) DEFAULT NULL,
  `LIEUADRESSE` char(32) DEFAULT NULL,
  `LIEUCP` int(2) DEFAULT NULL,
  `LIEUVILLE` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`LIEUID`, `LIEUNOMSALLE`, `LIEUADRESSE`, `LIEUCP`, `LIEUVILLE`) VALUES
(0, 'Salle 2105', '118 Rte de Narbonne', 31400, 'Toulouse');

-- --------------------------------------------------------

--
-- Structure de la table `participe`
--

CREATE TABLE `participe` (
  `COMPTEID` int(2) NOT NULL,
  `DOMAINID` int(2) NOT NULL,
  `FORMATIONID` int(2) NOT NULL,
  `SESSIONID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `participe`
--

INSERT INTO `participe` (`COMPTEID`, `DOMAINID`, `FORMATIONID`, `SESSIONID`) VALUES
(9, 0, 0, 1),
(9, 0, 2, 15),
(9, 1, 1, 17),
(9, 3, 0, 14),
(10, 0, 2, 15),
(10, 1, 0, 10),
(10, 2, 0, 16),
(10, 4, 2, 12),
(11, 3, 0, 14),
(11, 4, 1, 18),
(11, 4, 2, 12),
(12, 1, 0, 10),
(12, 1, 2, 5),
(12, 1, 4, 11),
(12, 4, 2, 12),
(13, 0, 0, 1),
(13, 0, 0, 3),
(13, 0, 0, 21),
(13, 0, 2, 15),
(13, 2, 0, 16),
(13, 3, 1, 19),
(13, 3, 1, 22),
(13, 4, 2, 8),
(14, 0, 0, 3),
(14, 0, 0, 21),
(14, 0, 1, 20),
(14, 1, 3, 13),
(14, 3, 1, 19),
(14, 3, 1, 22),
(14, 4, 1, 4),
(14, 4, 2, 8),
(14, 4, 2, 23),
(15, 0, 0, 3),
(15, 0, 1, 20),
(15, 0, 2, 15),
(15, 1, 0, 10),
(15, 1, 1, 17),
(15, 1, 2, 5),
(15, 1, 3, 13),
(15, 1, 4, 11),
(15, 2, 0, 16),
(15, 3, 0, 14),
(15, 3, 1, 22),
(15, 4, 2, 8),
(16, 0, 0, 1),
(16, 0, 0, 3),
(16, 0, 0, 21),
(16, 0, 1, 20),
(16, 0, 2, 15),
(16, 1, 0, 10),
(16, 1, 1, 17),
(16, 1, 2, 5),
(16, 1, 3, 13),
(16, 1, 4, 11),
(16, 2, 0, 16),
(16, 3, 0, 7),
(16, 3, 1, 19),
(16, 3, 1, 22),
(16, 4, 1, 4),
(16, 4, 1, 18),
(16, 4, 2, 8),
(16, 4, 2, 12),
(16, 4, 2, 23),
(17, 0, 0, 1);

--
-- Déclencheurs `participe`
--
DELIMITER $$
CREATE TRIGGER `before_insert_participe` BEFORE INSERT ON `participe` FOR EACH ROW BEGIN
  DECLARE nbplaces INT;
  SELECT NBPLACE INTO nbplaces FROM SESSION WHERE SESSIONID = NEW.SESSIONID;
  IF nbplaces <= (SELECT COUNT(*) FROM PARTICIPE WHERE SESSIONID = NEW.SESSIONID) THEN
    SIGNAL SQLSTATE '45000'
    SET MESSAGE_TEXT = 'Nombre de places disponibles dépassé pour la session';
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `session`
--

CREATE TABLE `session` (
  `DOMAINID` int(2) NOT NULL,
  `FORMATIONID` int(2) NOT NULL,
  `SESSIONID` int(2) NOT NULL,
  `LIEUID` int(2) NOT NULL,
  `SESSIONDATEDEBUT` date DEFAULT NULL,
  `SESSIONDATEFIN` date DEFAULT NULL,
  `SESSIONHEUREDEBUT` time DEFAULT NULL,
  `SESSIONHEUREFIN` time DEFAULT NULL,
  `SESSIONINTERVENENT` char(32) DEFAULT NULL,
  `SESSIONDATELIMITE` date DEFAULT NULL,
  `NBPLACE` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `session`
--

INSERT INTO `session` (`DOMAINID`, `FORMATIONID`, `SESSIONID`, `LIEUID`, `SESSIONDATEDEBUT`, `SESSIONDATEFIN`, `SESSIONHEUREDEBUT`, `SESSIONHEUREFIN`, `SESSIONINTERVENENT`, `SESSIONDATELIMITE`, `NBPLACE`) VALUES
(0, 0, 1, 0, '2023-06-24', '2023-08-11', '19:00:00', '21:00:00', 'Alice', '2023-08-11', 5),
(0, 0, 3, 0, '2023-04-01', '2023-04-02', '19:24:00', '19:24:00', 'Alice', '2023-04-02', 5),
(0, 0, 21, 0, '2023-04-10', '2023-04-12', '19:24:00', '19:24:00', 'Alice', '2023-04-12', 5),
(0, 1, 20, 0, '2023-02-10', '2023-02-12', '14:00:00', '18:00:00', 'Bob', '2023-02-12', 5),
(0, 2, 15, 0, '2023-10-01', '2023-10-05', '09:00:00', '16:00:00', 'Charlie', '2023-10-05', 10),
(1, 0, 10, 0, '2023-09-18', '2023-09-18', '16:36:00', '16:36:00', 'Charlie', '2023-09-18', 6),
(1, 1, 17, 0, '2023-12-05', '2023-12-07', '09:00:00', '12:00:00', 'David', '2023-12-07', 8),
(1, 2, 5, 0, '2023-06-03', '2023-06-03', '19:23:00', '19:23:00', 'David', '2023-06-03', 10),
(1, 3, 13, 0, '2023-02-01', '2023-02-03', '10:00:00', '15:00:00', 'Alice', '2023-02-03', 12),
(1, 4, 11, 0, '2023-06-01', '2023-06-03', '09:00:00', '17:00:00', 'David', '2023-06-03', 10),
(2, 0, 16, 0, '2023-12-10', '2023-12-11', '10:00:00', '12:00:00', 'Bob', '2023-12-11', 6),
(3, 0, 7, 0, '2023-10-03', '2022-10-04', '09:00:00', '17:00:00', 'David', '2022-10-04', 9),
(3, 0, 14, 0, '2023-09-05', '2023-09-07', '14:00:00', '18:00:00', 'Frank', '2023-09-07', 7),
(3, 1, 19, 0, '2023-04-20', '2023-04-23', '10:00:00', '15:00:00', 'Frank', '2023-04-23', 9),
(3, 1, 22, 0, '2023-04-10', '2023-04-12', '10:00:00', '15:00:00', 'Frank', '2023-04-12', 9),
(4, 1, 4, 0, '2023-02-13', '2023-02-11', '19:23:00', '19:23:00', 'Alice', '2023-02-11', 4),
(4, 1, 18, 0, '2023-06-24', '2023-06-25', '13:00:00', '17:00:00', 'Alice', '2023-06-25', 4),
(4, 2, 8, 0, '2023-04-03', '2023-04-03', '19:23:00', '19:23:00', 'Frank', '2023-04-03', 20),
(4, 2, 12, 0, '2023-07-15', '2023-07-20', '09:00:00', '16:00:00', 'Charlie', '2023-07-20', 8),
(4, 2, 23, 0, '2023-04-10', '2023-04-12', '19:23:00', '19:23:00', 'Frank', '2023-04-12', 20);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`AVISID`),
  ADD KEY `COMPTEID` (`COMPTEID`),
  ADD KEY `SESSIONID` (`SESSIONID`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`COMPTEID`),
  ADD UNIQUE KEY `COMPTEID` (`COMPTEID`),
  ADD UNIQUE KEY `COMPTELOGIN` (`COMPTELOGIN`),
  ADD KEY `ASSOCIATIONINSCRIE` (`ASSOCIATIONNOM`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`DOMAINID`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`DOMAINID`,`FORMATIONID`),
  ADD KEY `I_FK_FORMATION_DOMAINE` (`DOMAINID`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`LIEUID`);

--
-- Index pour la table `participe`
--
ALTER TABLE `participe`
  ADD PRIMARY KEY (`COMPTEID`,`DOMAINID`,`FORMATIONID`,`SESSIONID`),
  ADD KEY `I_FK_PARTICIPE_STAGIAIRE` (`COMPTEID`),
  ADD KEY `I_FK_PARTICIPE_SESSION` (`DOMAINID`,`FORMATIONID`,`SESSIONID`);

--
-- Index pour la table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`DOMAINID`,`FORMATIONID`,`SESSIONID`),
  ADD UNIQUE KEY `SESSIONID` (`SESSIONID`),
  ADD KEY `I_FK_SESSION_FORMATION` (`DOMAINID`,`FORMATIONID`),
  ADD KEY `I_FK_SESSION_LIEU` (`LIEUID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `AVISID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`COMPTEID`) REFERENCES `compte` (`COMPTEID`),
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`SESSIONID`) REFERENCES `session` (`SESSIONID`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_FORMATION_DOMAINE` FOREIGN KEY (`DOMAINID`) REFERENCES `domaine` (`DOMAINID`);

--
-- Contraintes pour la table `participe`
--
ALTER TABLE `participe`
  ADD CONSTRAINT `FK_PARTICIPE_SESSION` FOREIGN KEY (`DOMAINID`,`FORMATIONID`,`SESSIONID`) REFERENCES `session` (`DOMAINID`, `FORMATIONID`, `SESSIONID`),
  ADD CONSTRAINT `FK_PARTICIPE_STAGIAIRE` FOREIGN KEY (`COMPTEID`) REFERENCES `compte` (`COMPTEID`);

--
-- Contraintes pour la table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `FK_SESSION_FORMATION` FOREIGN KEY (`DOMAINID`,`FORMATIONID`) REFERENCES `formation` (`DOMAINID`, `FORMATIONID`),
  ADD CONSTRAINT `FK_SESSION_LIEU` FOREIGN KEY (`LIEUID`) REFERENCES `lieu` (`LIEUID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
