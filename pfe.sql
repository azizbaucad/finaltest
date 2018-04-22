-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Octobre 2015 à 12:33
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `pfe`
--

-- --------------------------------------------------------

--
-- Structure de la table `achat`
--

CREATE TABLE IF NOT EXISTS `achat` (
  `id_a` int(11) NOT NULL,
  `id_f` int(11) NOT NULL,
  `date_a` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `achat`
--

INSERT INTO `achat` (`id_a`, `id_f`, `date_a`) VALUES
(82, 4, '2015-07-27'),
(83, 7, '2015-07-27'),
(84, 3, '2015-07-27'),
(85, 7, '2015-07-27'),
(86, 1, '2015-10-09'),
(87, 7, '2015-10-13');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id_clt` int(11) NOT NULL,
  `CIN` varchar(200) NOT NULL,
  `Nom` varchar(20) DEFAULT NULL,
  `Prenom` varchar(200) NOT NULL,
  `tele` varchar(20) DEFAULT NULL,
  `Adresse` text
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_clt`, `CIN`, `Nom`, `Prenom`, `tele`, `Adresse`) VALUES
(51, 'AD85584', 'Mansouri', 'Zakaria', '06959995', 'hay inbiaat sale'),
(52, 'AE8549', 'Ahmed', 'Safrioui', '058498984', 'Hay takadoum Rabat'),
(53, 'AB28841', 'Bouazaoui', 'Ali', '054894958', 'Hay karima Sale'),
(54, 'BE184568', 'Asrii', 'youness', '0654985', ''),
(55, 'DR15649', 'Jarfi', 'said', '068848984', ''),
(56, 'SD54187', 'Bazoui', 'Mohamed', '058494', 'sale'),
(58, 'Autre', 'Autre', 'Autre', 'Autre', 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

CREATE TABLE IF NOT EXISTS `compte` (
  `id_cpt` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `nom_u` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `prenom_u` varchar(20) NOT NULL DEFAULT 'NOT NULL',
  `password` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compte`
--

INSERT INTO `compte` (`id_cpt`, `login`, `nom_u`, `prenom_u`, `password`, `image`) VALUES
(11, 'Admin', 'jarfi', 'ali', '123456', '_u06b0g0gh8_cu_3.jpg'),
(12, 'Admin', 'Alaoui', 'Ahmed', '123', 'wbjnhv_cc8f3yby4.jpg'),
(13, 'Agent', 'Mansouri', 'Zakaria', '0000', 'tl8akl2p2h93rij6.jpg'),
(14, 'Agent1', 'Masaoudi', 'Yassin', '123456789', 'guejrue_lvxpwxr7.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `d_achat`
--

CREATE TABLE IF NOT EXISTS `d_achat` (
  `id_da` int(11) NOT NULL,
  `id_a` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `qte_a` int(11) NOT NULL,
  `prix_a` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=699 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `d_achat`
--

INSERT INTO `d_achat` (`id_da`, `id_a`, `id_m`, `qte_a`, `prix_a`) VALUES
(684, 82, 24, 11, 154),
(685, 82, 33, 6, 390),
(686, 82, 35, 10, 750),
(687, 83, 25, 20, 380),
(688, 83, 36, 5, 275),
(689, 84, 35, 20, 1560),
(690, 84, 26, 2, 40),
(691, 84, 36, 10, 550),
(692, 84, 36, 20, 1160),
(693, 83, 37, 10, 1500),
(694, 82, 34, 10, 850),
(695, 82, 27, 10, 450),
(696, 85, 29, 5, 595),
(697, 85, 30, 5, 110),
(698, 85, 32, 6, 54);

-- --------------------------------------------------------

--
-- Structure de la table `d_vente`
--

CREATE TABLE IF NOT EXISTS `d_vente` (
  `id_dv` int(11) NOT NULL,
  `id_v` int(11) NOT NULL,
  `id_m` int(11) NOT NULL,
  `qte_v` int(11) NOT NULL,
  `prix_v` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `d_vente`
--

INSERT INTO `d_vente` (`id_dv`, `id_v`, `id_m`, `qte_v`, `prix_v`) VALUES
(39, 36, 24, 10, 50),
(40, 36, 36, 5, 75),
(43, 38, 25, 2, 40),
(44, 39, 36, 2, 120),
(45, 39, 36, 2, 130),
(46, 36, 25, 6, 396),
(47, 36, 25, 3, 195);

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_f` int(11) NOT NULL,
  `nom_f` varchar(55) NOT NULL,
  `tele_f` varchar(55) NOT NULL,
  `adresse_f` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_f`, `nom_f`, `tele_f`, `adresse_f`) VALUES
(1, 'Mohamed', '0652589', 'Rabat '),
(2, 'said', '05984123', 'rabat Irfan'),
(3, 'Achraf', '06685498', 'rabat'),
(4, 'Ali', '05989526', 'Rabat'),
(5, 'Brahim', '066959845', 'Sale'),
(6, 'Hassan', '0648454125', 'Marakech'),
(7, 'Hamza', '0654848', 'Sale'),
(9, 'Marzouki', '05894984', 'sale'),
(10, 'Marzouki', '89+889+8', 'jfgjghj');

-- --------------------------------------------------------

--
-- Structure de la table `medicament`
--

CREATE TABLE IF NOT EXISTS `medicament` (
  `id_m` int(11) NOT NULL,
  `code_barre` varchar(200) NOT NULL,
  `desg` varchar(55) NOT NULL,
  `form` varchar(55) NOT NULL,
  `famille` varchar(200) NOT NULL,
  `Prix_u` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `medicament`
--

INSERT INTO `medicament` (`id_m`, `code_barre`, `desg`, `form`, `famille`, `Prix_u`) VALUES
(24, '11112', 'DOLIPRANE 1 g', 'Comprimé effervescent sécable', 'DOLIPRANE ', 15),
(25, '2222', 'DOLIPRANE 1 g ', 'Suppositoire', 'DOLIPRANE', 20),
(26, '33333', 'DOLIPRANE 100 mg', ' Sachet', 'DOLIPRANE', 22),
(27, '44444', 'DICLO PHARMA 5 100 mg ', ' Suppositoire', 'DICLO PHARMA 5', 50),
(29, '66666', 'ACIDAC 150 mg ', ' Comprimé', 'ACIDAC', 100),
(30, '7777', 'ACIDAC 300 mg', ' Comprimé', 'ACIDAC ', 23),
(31, '8888', 'ALIVIAR 50 mg', 'Gélule', 'ALIVIAR', 100),
(32, '9999', 'ALPHA-KADOL', ' Pommade', 'ALPHA-KADOL', 10),
(33, '10000', 'AMOXIL 1 g ', 'Comprimé dispersible', 'AMOXIL ', 70),
(34, '100012', 'AMOXIL 125 mg ', 'Poudre pour sirop', 'AMOXIL ', 90),
(35, '10111', 'AMOXIL 250 mg ', 'Poudre pour sirop', 'AMOXIL', 80),
(36, '1121211', 'ANDOL 1000 mg ', 'Comprimé effervescent', 'ANDOL', 60),
(37, '122205', 'ANDRIOL 40 mg', 'Capsule', 'ANDRIOL ', 152);

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `id_v` int(11) NOT NULL,
  `id_clt` int(11) NOT NULL,
  `date_v` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vente`
--

INSERT INTO `vente` (`id_v`, `id_clt`, `date_v`) VALUES
(36, 54, '2015-07-27'),
(38, 56, '2015-07-27'),
(39, 56, '2015-07-27');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_a`), ADD KEY `achat_ibfk_2` (`id_f`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_clt`);

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id_cpt`);

--
-- Index pour la table `d_achat`
--
ALTER TABLE `d_achat`
  ADD PRIMARY KEY (`id_da`);

--
-- Index pour la table `d_vente`
--
ALTER TABLE `d_vente`
  ADD PRIMARY KEY (`id_dv`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_f`);

--
-- Index pour la table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`id_m`);

--
-- Index pour la table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`id_v`), ADD KEY `vente_ibfk_1` (`id_clt`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `achat`
--
ALTER TABLE `achat`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_clt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id_cpt` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `d_achat`
--
ALTER TABLE `d_achat`
  MODIFY `id_da` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=699;
--
-- AUTO_INCREMENT pour la table `d_vente`
--
ALTER TABLE `d_vente`
  MODIFY `id_dv` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT pour la table `vente`
--
ALTER TABLE `vente`
  MODIFY `id_v` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
